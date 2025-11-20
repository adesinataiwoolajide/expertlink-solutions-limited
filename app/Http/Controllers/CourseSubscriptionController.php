<?php

namespace App\Http\Controllers;

use App\Models\{Programs, Courses, CourseAllocationHistories, CourseSubscription,CourseNotes};
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\{Auth};

class CourseSubscriptionController extends Controller
{
    protected $model;
    public function __construct(CourseSubscription $courses)
    {
        $this->middleware('auth');
        $this->middleware('role:Administrator|Admin|Instructor|Student');

        $this->model = new GeneralRepository($courses);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasAnyRole(['Administrator', 'Admin', 'Student'])) {
            $query = CourseSubscription::with(['program', 'user', 'payment', 'course'])->orderBy('created_at', 'desc');
            if ($user->hasRole('Student')) {
                $query->where('userSlug', $user->slug);
            }
            $courses = $query->paginate(50);
            return view('home.courses.myLearnings', compact('courses', 'filePath'));
        } else {
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $course = Courses::with([ 'notes.materials', 'notes.instructor', 'allocation.user','program', 'user' ])->where(['slug' => $slug])->first();
        if(!$course){
            return redirect()->back()->with("error", "Course details does not exists");
        }
       
        $filePath = 'course_videos/' . $course->course_introduction;
        $notes = $course->notes()->with('course', 'allocation', 'materials', 'instructor')->orderBy('created_at', 'desc')->paginate(100);
        return view('home.notes.courseIndex', compact('course', 'notes','filePath'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function viewLearning($noteSlug, $courseSlug)
    {
        $note = CourseNotes::where(['slug' => $noteSlug, 'courseSlug' => $courseSlug])->with('materials', 'allocation', 'instructor', 'course')->first();
        $course = Courses::with([ 'notes.materials', 'notes.instructor', 'allocation.user','program', 'user' ])->where(['slug' => $courseSlug])->first();
        if (!$note || !$course) {
            return redirect()->back()->with("error", "Course note details do not exist");
        }
        $notes = $course->notes()->whereNotIn('slug', [$noteSlug]) ->with('course', 'allocation', 'materials', 'instructor')->orderBy('created_at', 'desc')->paginate(10);
        return view('home.notes.courseRead', compact('course', 'note', 'notes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseSubscription $courseSubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSubscription $courseSubscription)
    {
        //
    }
}
