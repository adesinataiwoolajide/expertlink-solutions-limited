<?php

namespace App\Http\Controllers;

use App\Models\{Courses, Assignment, CourseSubscription,CourseNotes, AssignmentSubmission};
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\{Auth};
class AssignmentSubmissionController extends Controller
{
    protected $model;
    public function __construct(AssignmentSubmission $assignment)
    {
        $this->middleware('auth');
        $this->middleware('role:Administrator|Admin|Instructor|Student');

        $this->model = new GeneralRepository($assignment);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $query = null;
        if ($user->hasAnyRole(['Administrator', 'Admin'])) {
            $query = AssignmentSubmission::orderBy('created_at', 'desc')->paginate(400);
        } elseif ($user->hasAnyRole(['Instructor'])) {
            $query =AssignmentSubmission::where('instructorSlug', $user->slug);
        } else {
            $query = AssignmentSubmission::where('studentSlug', $user->slug);
        }
        $assignments = $query->with(['instructor', 'course', 'submissions', 'note'])->orderBy('created_at', 'desc')->paginate(400);
        return view('home.submissions.index', compact( 'assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $user = Auth::user();
        $query = Assignment::with(['instructor', 'course', 'submissions'])->where('slug', $slug);
        if ($user->hasAnyRole(['Administrator', 'Admin'])) {
            $assignment = $query->first();
        } elseif ($user->hasAnyRole(['Instructor'])) {
            $assignment = $query->where('instructorSlug', $user->slug)->first();
        } else {
            $mySubs = CourseSubscription::where('userSlug', $user->slug)->pluck('courseSlug');
            $assignment = $query->whereIn('courseSlug', $mySubs)->first();
        }

        if (!$assignment) {
            return redirect()->back()->with('error', 'No assignment was found.');
        }
        return view('home.submissions.create', compact( 'assignment'));
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
        $assignment = AssignmentSubmission::where('slug', $slug)->with(['instructor', 'course', 'note', 'assignment', 'student'])->first();
        if(!$assignment){
            return redirect()->back()->with('error', 'No assignment was found.');
        }
        dd($assignment);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignmentSubmission $assignmentSubmission)
    {
        //
    }
}
