<?php

namespace App\Http\Controllers;

use App\Models\{Task, Courses, Assignment, CourseSubscription,CourseNotes};
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
    public function assignments($noteSlug)
    {
        $note = CourseNotes::where('slug', $noteSlug)->first();
        if (!$note) {
            return redirect()->back()->with("error", "Course details do not exist");
        }
        $user = Auth::user();
        $query = null;
        if ($user->hasAnyRole(['Administrator', 'Admin'])) {
            $query = $note->assignments();
        } elseif ($user->hasAnyRole(['Instructor'])) {
            $query = $note->assignments()->where('instructorSlug', $user->slug);
        } else {
            $query = $note->submissions()->where('studentSlug', $user->slug);
        }

        $assignments = $query->with(['instructor', 'course', 'submissions'])->orderBy('created_at', 'desc')->paginate(100);

        return view('home.assignments.create', compact('note', 'assignments'));
    }

     public function courseassignments($slug)
    {
        $course = Courses::where('slug', $slug)->firstOrFail();

        $assignments = Assignment::where('courseSlug', $course->slug)
            ->where('studentSlug', Auth::user()->slug)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('home.courses.assignments', compact('course', 'assignments'));
    }

    public function progress($slug)
    {
        $note = CourseNotes::where('slug', $slug)->firstOrFail();

        $assignmentProgress = $note->progressForStudent();
        $taskProgress = $note->taskProgressForStudent();
        $overallProgress = round(($assignmentProgress + $taskProgress) / 2, 2);

        return view('home.notes.progress', compact('note', 'assignmentProgress', 'taskProgress', 'overallProgress'));
    }

    public function courseprogress($slug)
    {
        $course = Courses::where('slug', $slug)->firstOrFail();
        $assignmentProgress = $course->progressForStudent();
        $taskProgress = $course->taskProgressForStudent();
        $overallProgress = round(($assignmentProgress + $taskProgress) / 2, 2);
        return view('home.courses.progress', compact('course', 'assignmentProgress', 'taskProgress', 'overallProgress'));
    }

      public function coursetasks($noteSlug)
    {
        // $course = Courses::where('slug', $slug)->firstOrFail();
        // $tasks = Task::where('courseSlug', $course->slug)
        //     ->where('studentSlug', Auth::user()->slug)
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(20);

        // return view('home.courses.tasks', compact('course', 'tasks'));
        // $note = CourseNotes::where('slug', $noteSlug)->first();
        // if (!$note) {
        //     return redirect()->back()->with("error", "Course details do not exist");
        // }
        // $user = Auth::user();
        // $query = null;
        // if ($user->hasAnyRole(['Administrator', 'Admin'])) {
        //     $query = $note->tasks();
        // } elseif ($user->hasAnyRole(['Instructor'])) {
        //     $query = $note->tasks()->where('instructorSlug', $user->slug);
        // } else {
        //     $query = $note->tasksubmissions()->where('studentSlug', $user->slug);
        // }

        // $assignments = $query->orderBy('created_at', 'desc')->paginate(100);

        // return view('home.assignments.tasks', compact('note', 'assignments'));
    }
    public function tasks($noteSlug)
    {
        $note = CourseNotes::where('slug', $noteSlug)->first();
        if (!$note) {
            return redirect()->back()->with("error", "Course details do not exist");
        }
        $user = Auth::user();
        $query = null;
        if ($user->hasAnyRole(['Administrator', 'Admin'])) {
            $query = $note->tasks();
        } elseif ($user->hasAnyRole(['Instructor'])) {
            $query = $note->tasks()->where('instructorSlug', $user->slug);
        } else {
            $query = $note->tasksubmissions()->where('studentSlug', $user->slug);
        }

        $assignments = $query->orderBy('created_at', 'desc')->paginate(100);

        return view('home.assignments.tasks', compact('note', 'tasks'));

        // return view('home.assignments.tasks', compact('note', 'tasks'));
    }


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
        $notes = $course->notes()->with(['course','allocation','materials','instructor'])
        ->withCount([
            'submissions as student_assignments_count' => fn($q) => $q->where('studentSlug', Auth::user()->slug),
            'tasksubmission as student_tasks_count' => fn($q) => $q->where('studentSlug', Auth::user()->slug),
        ])
        ->where('status', 1)
        ->orderBy('created_at','desc')->paginate(20);
        $assignmentProgress = $course->progressForStudent();
        $taskProgress = $course->taskProgressForStudent();
        return view('home.notes.courseIndex', compact('course', 'notes','filePath', 'assignmentProgress', 'taskProgress'));
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
        
        $notes = $course->notes()->with(['course','allocation','materials','instructor'])
        ->withCount([
            'assignments as student_assignments_count' => fn($q) => $q->forStudent(),
            'tasks as student_tasks_count' => fn($q) => $q->forStudent(),
        ])->whereNotIn('slug', [$noteSlug])->orderBy('created_at','desc')->paginate(20);
        $assignmentProgress = $course->progressForStudent();
        $taskProgress = $course->taskProgressForStudent();
        return view('home.notes.courseRead', compact('course', 'note', 'notes', 'assignmentProgress', 'taskProgress'));
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
