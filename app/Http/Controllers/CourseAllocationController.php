<?php

namespace App\Http\Controllers;

use App\Models\{Programs, Courses, CourseAllocation};
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
        if(Auth::user()->hasAnyRole(['Administrator',"Admin"])){
            return view('home.allocations.index')->with([
                'allocations' => CourseAllocation::orderBy('created_at', 'desc')->get()
            ]);
        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
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
        $exists = CourseAllocation::where(['courseSlug' => $courseSlug, 'programSlug' => $programSlug])->exists();
        if ($exists) {
            CourseAllocation::where(['courseSlug' => $courseSlug, 'programSlug' => $programSlug])->update(['userSlug' => $userSlug,]);
            createLog("Allocated: $slug for $courseSlug to $userSlug Successfully");
            return redirect()->back()->with('success', 'This course updated successfully.');
        }
        CourseAllocation::create([
            'slug' => $slug, 'userSlug' => $userSlug, 'courseSlug' => $courseSlug, 'programSlug' => $programSlug,
        ]);
        createLog("Allocated: $slug for $courseSlug to $userSlug Successfully");
        return redirect()->back()->with('success', 'Course successfully allocated.');

    }

    /**
     * Display the specified resource.
     */
    public function show(CourseAllocation $courseAllocation)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseAllocation $courseAllocation)
    {
        //
    }
}
