<?php

namespace App\Http\Controllers;

use App\Models\{Task, Courses, Assignment, CourseSubscription,CourseNotes};
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\{Auth};
use App\Http\Requests\{StoreAssignmentRequest, UpdateAssignmentRequest};

class AssignmentController extends Controller
{
    protected $model;
    public function __construct(Assignment $assignment)
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
            $query = Assignment::orderBy('created_at', 'desc')->paginate(400);
        } elseif ($user->hasAnyRole(['Instructor'])) {
            $query =Assignment::where('instructorSlug', $user->slug);;
        } else {
            $mySubs = CourseSubscription::where('userSlug', $user->slug)->pluck('courseSlug');
            $query = Assignment::whereIn('courseSlug', $mySubs);
        }
        $assignments = $query->with(['instructor', 'course', 'submissions', 'note'])->orderBy('created_at', 'desc')->paginate(400);
        return view('home.assignments.index', compact( 'assignments'));
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
    public function store(StoreAssignmentRequest $request, $noteSlug)
    {
        
        $request->user()->fill($request->validated());
        $notes = CourseNotes::where('slug', $noteSlug)->with(['materials', 'course'])->first();
        if(!$notes){
            return redirect()->back()->with('error', 'No course note was found.');
        }
        $due_date = $request->input('due_date');
        $max_score = $request->input('max_score');
        $description = $request->input('description');
        $courseSlug = $request->input('courseSlug');
        $slug = RandomString(9);
        $data = ([
            'assignment' => new Assignment, 'slug' => $slug,
            'instructorSlug' => Auth::user()->slug,
            'noteSlug' => $noteSlug, 'courseSlug' => $courseSlug,
            'submission_status' => "Pending", 'description' => $description,
            'due_date' => $due_date, 'max_score' => $max_score, 'remark' => 'Assignment',
        ]);
        
        if($this->model->create($data)){
            createLog( 'Added Assignment for Course Note with ID: '.$noteSlug);
            return redirect()->back()->with("success", "Assignment Created Successfully");
        }else{
            return redirect()->back()->with("error", "Network Failure, Please try again later");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignmentRequest $request, $slug)
    {
        $request->user()->fill($request->validated());
        $assignment = Assignment::where('slug', $slug)->with(['instructor', 'course', 'submissions'])->first();
        if(!$assignment){
            return redirect()->back()->with('error', 'No assignment was found.');
        }
        $due_date = $request->input('due_date');
        $max_score = $request->input('max_score');
        $description = $request->input('description');
        $courseSlug = $request->input('courseSlug');
        $noteSlug = $request->input('noteSlug');
        $data = ([
            'assignment' => $this->model->show($assignment->id), 'slug' => $slug, 'courseSlug' => $courseSlug,
            'instructorSlug' => $assignment->instructorSlug, 'noteSlug' => $noteSlug, 'submission_status' => "Pending",
            'description' => $description, 'due_date' => $due_date, 'max_score' => $max_score, 'remark' => 'Assignment',
        ]);
        
        if($this->model->update($data, $assignment->id)){
            createLog( 'Updated Assignment for Course Note with ID: '.$noteSlug);
            return redirect()->back()->with("success", "Assignment Updated Successfully");
        }else{
            return redirect()->back()->with("error", "Network Failure, Please try again later");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
