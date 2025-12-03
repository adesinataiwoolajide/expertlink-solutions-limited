<?php

namespace App\Http\Controllers;

use App\Models\{Programs, Courses, CourseAllocation, CourseAllocationHistories, User, CourseNotes};
use App\Http\Requests\{StoreCourseAllocationRequest, UpdateCourseAllocationRequest};
use Illuminate\Support\Facades\{Auth, Mail};
use App\Repositories\GeneralRepository;
use Illuminate\Http\Request;
use App\Mail\{CourseAllocationNotification};

class CourseAllocationController extends Controller
{
    protected $model;

    public function __construct(CourseAllocation $courseAllocation)
    {
        $this->middleware('auth');
        $this->middleware('role:Administrator|Admin|Instructor');
        $this->model = new GeneralRepository($courseAllocation);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $user = Auth::user();
        $query = CourseAllocation::with(['user', 'course', 'program', 'allocationHistory'])
            ->orderBy('created_at', 'desc');

        if ($user->hasAnyRole(['Administrator', 'Admin'])) {
            $allocations = $query->get();
        } elseif ($user->hasRole('Instructor')) {
            $allocations = $query->where('userSlug', $user->slug)->get();
        } else {
            return view('errors.403', [
                'message' => 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal'
            ]);
        }

        // 🔹 Group allocations by program
        $allocationByProgram = $allocations->groupBy('programSlug')->map(function ($group) {
            return [
                'program' => $group->first()->program?->program_name ?? $group->first()->programSlug,
                'count'   => $group->count()
            ];
        });

        // 🔹 Group allocations by course
        $allocationByCourse = $allocations->groupBy('courseSlug')->map(function ($group) {
            return [
                'course' => $group->first()->course?->course_name ?? $group->first()->courseSlug,
                'count'  => $group->count()
            ];
        });

        $allocationByInstructor = $allocations->groupBy('userSlug')->map(function ($group) {
            return [
                'instructor' => $group->first()->user?->email ?? $group->first()->userSlug,
                'count'      => $group->count()
            ];
        });

        return view('home.allocations.index')->with([
            'allocations'           => $allocations,
            'allocationByProgram'   => $allocationByProgram,
            'allocationByCourse'    => $allocationByCourse,
            'allocationByInstructor'=> $allocationByInstructor,
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseAllocationRequest $request)
    {
        $request->user()->fill($request->validated());
        $courseSlug = $request->input('courseSlug');
        $programSlug = $request->input('programSlug');
        $userSlug = $request->input('userSlug');
        $slug = RandomString(10);
        $exists = CourseAllocation::where(['userSlug' => $userSlug,'courseSlug' => $courseSlug, 'programSlug' => $programSlug])->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'You have allocated this course to this instructor before.');
        }
        CourseAllocation::create([
            'slug' => $slug, 'userSlug' => $userSlug, 'courseSlug' => $courseSlug, 'programSlug' => $programSlug,
        ]);
        createCourseAllocationHistory($slug, $userSlug, $userSlug);
        createLog("Allocated: $slug for $courseSlug to $userSlug Successfully");
        $details = ["allocation" => CourseAllocation::with(['user', 'course', 'program', 'allocationHistory'])->where('slug', $slug)->first()];
        $receive = User::where('slug', $userSlug)->first();
        $email = $receive->email;
        Mail::to($email)->cc(['tolajide74@gmail.com','support@expertlinksolutions.org'])->send( new CourseAllocationNotification ($details));
        return redirect()->route('allocation.view',$slug)->with('success', 'Course successfully allocated.');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $user = Auth::user();
        $query = CourseAllocation::with(['user', 'course', 'program', 'allocationHistory'])->where('slug', $slug);
        if (!$user->hasAnyRole(['Administrator', 'Admin'])) {
            $query->where('userSlug', $user->slug);
        }
        $allocation = $query->first();
        if (!$allocation) {
            return redirect()->back()->with('error', 'No record was found.');
        }
        $course = $allocation->course()->with('program', 'allocations')->first();
        $program_name = $course->program->program_name ?? 'NIL';
        $users = User::where(['role' => 'Instructor', 'status' => 1])->orderBy('first_name', 'asc')->get();
        $history = $allocation->allocationHistory()->where('allocationSlug', $allocation->slug)->with(['previousUser', 'newUser', 'addedBy'])->orderBy('created_at', 'desc')->get();
        $notes = $course->notes()->with(['course','allocation','materials','instructor']) ->withCount(['assignments', 'tasks'])->orderBy('created_at','desc')->paginate(10);
        
        return view('home.allocations.show')->with([
            'allocation' => $allocation, 'course' => $course, 'slug' => $slug, 'allocationHistories' => $history, 'program_name' => $program_name,
            'users' => $users, 'user' => $user, 'notes' => $notes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseAllocation $courseAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseAllocationRequest $request, $slug)
    {
        $request->user()->fill($request->validated());
        $course = CourseAllocation::where(['slug' => $slug])->with(['user', 'course', 'program', 'allocationHistory'])->first();
        if (!$course) {
            return redirect()->back()->with('error', 'No record was found for this course allocation.');
        }
        $courseSlug = $request->input('courseSlug');
        $userSlug = $request->input('userSlug');
        $oldUserSlug = $request->input('oldUserSlug');
        CourseAllocation::where(['slug' => $slug])->update(['userSlug' => $userSlug,]);
        createLog("Updated Course Allocation with: $slug for $courseSlug to $userSlug Successfully");
        createCourseAllocationHistory($slug, $oldUserSlug, $userSlug);
        $details = ["allocation" => $course];
        $receive = User::where('slug', $userSlug)->first();
        $email = $receive->email;
        Mail::to($email)->cc(['tolajide74@gmail.com','support@expertlinksolutions.org'])->send( new CourseAllocationNotification ($details));
        return redirect()->route('allocation.view',$slug)->with('success', 'You have updated the Course Allocation successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseAllocation $courseAllocation)
    {
        //
    }
}
