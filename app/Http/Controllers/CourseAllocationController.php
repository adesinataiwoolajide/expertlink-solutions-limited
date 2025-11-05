<?php

namespace App\Http\Controllers;

use App\Models\{Programs, Courses, CourseAllocation, CourseAllocationHistories, User, CourseNotes};
use App\Http\Requests\{StoreCourseAllocationRequest, UpdateCourseAllocationRequest};
use Illuminate\Support\Facades\{Auth};
use App\Repositories\GeneralRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\{HasMiddleware,Middleware};
class CourseAllocationController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth', new Middleware('role:Administrator|Admin|Instructor'),
        ];
    }
    public function __construct(CourseAllocation $courses){
        $this->model = new GeneralRepository($courses);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $query = CourseAllocation::with(['user', 'course', 'program', 'allocationHistory'])->orderBy('created_at', 'desc');
        if ($user->hasAnyRole(['Administrator', 'Admin'])) {
            $allocations = $query->get();
        } elseif ($user->hasRole('Instructor')) {
            $allocations = $query->where('userSlug', $user->slug)->get();
        } else {
            return view('errors.403', [
                'message' => 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal'
            ]);
        }
        return view('home.allocations.index')->with([
            'allocations' => $allocations
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
        $history = CourseAllocationHistories::where('allocationSlug', $allocation->slug)->with(['previousUser', 'newUser', 'addedBy'])->orderBy('created_at', 'desc')->get();
        $notes = CourseNotes::where(['courseSlug' => $course->slug])->orderBy('id', 'desc')->paginate(10);
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
        $course = CourseAllocation::where(['slug' => $slug])->first();
        if (!$course) {
            return redirect()->back()->with('error', 'No record was found for this course allocation.');
        }
        $courseSlug = $request->input('courseSlug');
        $userSlug = $request->input('userSlug');
        $oldUserSlug = $request->input('oldUserSlug');
        CourseAllocation::where(['slug' => $slug])->update(['userSlug' => $userSlug,]);
        createLog("Updated Course Allocation with: $slug for $courseSlug to $userSlug Successfully");
        createCourseAllocationHistory($slug, $oldUserSlug, $userSlug);
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
