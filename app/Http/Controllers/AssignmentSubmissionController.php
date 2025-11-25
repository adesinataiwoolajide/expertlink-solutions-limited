<?php

namespace App\Http\Controllers;

use App\Models\{Courses, Assignment, CourseSubscription,CourseNotes, AssignmentSubmission};
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\{Auth};
use App\Http\Requests\{StoreAssignmentSubmissionRequest, UpdateAssignmentSubmissionRequest};

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

        $submitted = $assignment->submissions()->where('studentSlug', Auth::user()->slug)->get();
        
        return view('home.submissions.create', compact( 'assignment', 'submitted'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignmentSubmissionRequest $request, $slug)
    {
        $request->user()->fill($request->validated());
        $courseSlug = $request->input('courseSlug');
        $noteSlug = $request->input('noteSlug');
        $instructorSlug = $request->input('instructorSlug');
        $answer_text = $request->input('answer_text');
        $submission = AssignmentSubmission::create([
            'slug' => RandomString(9),'assignmentSlug' => $slug,'studentSlug' => $request->user()->slug, // current user
            'answer_text' => $answer_text, 'student_score' => 0,  'submission_status'=> 'submitted',
            'submission_remark'=> 'Pending', 'noteSlug' => $noteSlug, 
            'instructorSlug' => $instructorSlug, 'courseSlug' => $courseSlug, 'status' => 'submitted',
        ]);
        return redirect() ->back()->with('success', 'Assignment submitted successfully!');
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
    public function update(UpdateAssignmentSubmissionRequest $request, $submissionSlug)
    {
        $request->user()->fill($request->validated());
        $submission = AssignmentSubmission::where('slug', $submissionSlug)->first();
        if(!$submission){
            return redirect()->back()->with('error', 'No assignment submission was found.');
        }
        $answer_text = $request->input('answer_text');
        if($submission->update(['answer_text' => $answer_text])){
            return redirect() ->back()->with('success', 'Assignment updated successfully!');
        }else{
            return redirect()->back()->with("error", "Network Failure, Please try again later");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignmentSubmission $assignmentSubmission)
    {
        //
    }
}
