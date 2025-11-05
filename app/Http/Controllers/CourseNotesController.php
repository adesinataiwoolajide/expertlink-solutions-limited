<?php

namespace App\Http\Controllers;
use App\Models\{Programs, Courses, User, CourseAllocationHistories, CourseNotes, CourseAllocation, CourseMaterials};
use Illuminate\Http\Request;

use App\Http\Requests\{StoreCourseNoteRequest, UpdateCourseNoteRequest};
use Illuminate\Support\Facades\{Auth};
use App\Repositories\GeneralRepository;
use Illuminate\Routing\Controllers\{HasMiddleware,Middleware};
class CourseNotesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth', new Middleware('role:Administrator|Admin|Instructor'),
        ];
    }
    public function __construct(CourseNotes $courses){
        $this->model = new GeneralRepository($courses);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($courseSlug, $allocationSlug)
    {
        $user = Auth::user();
        $course = Courses::with(['program', 'allocations'])->where('slug', $courseSlug)->first();
        $allocationQuery = CourseAllocation::with(['user', 'course', 'program', 'allocationHistory'])->where('slug', $allocationSlug);
        if ($user->hasAnyRole(['Instructor'])) {
            $allocationQuery->where('userSlug', $user->slug);
        }
        $allocation = $allocationQuery->first();
        if (!$course || !$allocation) {
            return redirect()->back()->with('error', 'Course or allocation record not found.');
        }
        if(Auth::user()->hasAnyRole(['Administrator', "Instructor"])){
            $selectedTypes = is_array($course->training_type) ? $course->training_type : json_decode($course->training_type, true);
            $program_name = $course->program->program_name ?? 'NIL';
            return view('home.notes.create')->with([
                'course' => $course, 'selectedType' => $selectedTypes, 'program_name' => $program_name, 'allocation' => $allocation,
                'allocationSlug' => $allocationSlug, 'courseSlug' => $courseSlug
            ]);

        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseNoteRequest $request)
    {
        $request->user()->fill($request->validated());
        $slug = RandomString(8); 
        $notes = CourseNotes::where([
            'topic' => $request->input('topic'), 'instructorSlug' => Auth::user()->slug ?? 'unknown',
            'allocatonSlug' => $request->input('allocationSlug'), 'courseSlug' => $request->input('courseSlug'),
            'programSlug' => $request->input('programSlug')
        ])->first();
        if($notes){
            return redirect()->route('course.note.show',$notes->slug)->with('error', 'You have submitted this course note before.');
        }
        $stat = $request->input('postNote');
        $status = ($stat === 'now');
        $data = new CourseNotes([
            'slug' => $slug, 'topic' => $request->input('topic'),
            'content' => $request->input('content') ?: 'NULL',
            'title'  => $request->input('title') ?: 'NULL',
            'chapter' => $request->input('chapter') ?: 'NULL',
            'link_one' => $request->input('link_one') ?? 'NULL',
            'link_two' => $request->input('link_two') ?? 'NULL',
            'link_three' => $request->input('link_three') ?? 'NULL',
            'link_four' => $request->input('link_four') ?? 'NULL',
            'status' => $status, 'instructorSlug'=> Auth::user()->slug ?? 'Unknown',
            'allocatonSlug' => $request->input('allocationSlug'),
            'courseSlug' => $request->input('courseSlug'),
            'programSlug'   => $request->input('programSlug'),
        ]);
        if ($data->save()) {
            $files = $request->file('material');
            if ($files) {
                $files = is_array($files) ? $files : [$files]; 
                foreach ($files as $file) {
                    if ($file->isValid()) {
                        $filenameWithExt = $file->getClientOriginalName();
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension = $file->getClientOriginalExtension();
                        $fileNameToStore = $filename.'_'.date('Y-m-d').'.'.$extension;
                        $file->storeAs('course-material', $fileNameToStore);
                        CourseMaterials::create([
                            'slug' => RandomString(8),
                            "courseSlug" => $request->input("courseSlug"),
                            "course_file" => $fileNameToStore,
                            "noteSlug" => $slug,
                        ]);
                    }
                }
            }
            createLog("Created a Course Note with: $slug and Topic ". $request->input('topic'));
            return redirect()->route('course.note.show',$slug)->with('success', 'You have submitted the course note successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $user = Auth::user();
        $notes = CourseNotes::where('slug', $slug)->with(['materials', 'course'])->first();
        if(!$notes){
            return redirect()->back()->with('error', 'No course note was found.');
        }
        $query = CourseAllocation::with(['user', 'course', 'program', 'allocationHistory'])->where('slug', $notes->allocatonSlug);
        if (!$user->hasAnyRole(['Administrator', 'Admin'])) {
            $query->where('userSlug', $user->slug);
        }
        $allocation = $query->first();
        if (!$allocation) {
            return redirect()->back()->with('error', 'No course allocation was found for this note.');
        }
        $course = $allocation->course()->with('program', 'allocations')->first();
        $materials = $notes->materials()->orderBy('created_at', 'desc')->get();
        return view('home.notes.show')->with([
            'course' => $course, 'allocation' => $allocation,'notes' => $notes,
            'materials' => $materials
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $user = Auth::user();
        $notes = CourseNotes::where('slug', $slug)->first();
        if(!$notes){
            return redirect()->back()->with('error', 'No course note was found for '. $slug);
        }
        $courseSlug = $notes->courseSlug;
        $allocationSlug = $notes->allocatonSlug;
        $course = Courses::with(['program', 'allocations'])->where('slug', $courseSlug)->first();

        $allocationQuery = CourseAllocation::with(['user', 'course', 'program', 'allocationHistory'])->where('slug', $allocationSlug);
        if ($user->hasAnyRole(['Instructor'])) {
            $allocationQuery->where('userSlug', $user->slug);
        }
        $allocation = $allocationQuery->first();
        if (!$course || !$allocation) {
            return redirect()->back()->with('error', 'Course or allocation record not found.');
        }
        if(Auth::user()->hasAnyRole(['Administrator', "Instructor"])){
            $selectedTypes = is_array($course->training_type) ? $course->training_type : json_decode($course->training_type, true);
            $program_name = $course->program->program_name ?? 'NIL';
            return view('home.notes.edit')->with([
                'course' => $course, 'selectedType' => $selectedTypes, 'program_name' => $program_name, 'allocation' => $allocation,
                'allocationSlug' => $allocationSlug, 'courseSlug' => $courseSlug, 'notes' => $notes
            ]);

        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseNoteRequest $request, $slug)
    {
        $user = Auth::user();
        $request->user()->fill($request->validated());
        $notes = CourseNotes::where('slug', $slug)->first();
        if(!$notes){
            return redirect()->back()->with('error', 'No course note was found.');
        }
        
        $stat = $request->input('postNote');
        $previousTopic = $request->input('previousTopic');
        $status = ($stat === 'now');
        $update = $notes->update([
            'topic' => $request->input('topic'),
            'content' => $request->input('content') ?: 'NULL',
            'title'  => $request->input('title') ?: 'NULL',
            'chapter' => $request->input('chapter') ?: 'NULL',
            'link_one' => $request->input('link_one') ?? 'NULL',
            'link_two' => $request->input('link_two') ?? 'NULL',
            'link_three' => $request->input('link_three') ?? 'NULL',
            'link_four' => $request->input('link_four') ?? 'NULL',
            'status' => $status,
        ]);
        if ($update) {
            $files = $request->file('material');
            if ($files) {
                $files = is_array($files) ? $files : [$files]; 
                foreach ($files as $file) {
                    if ($file->isValid()) {
                        $filenameWithExt = $file->getClientOriginalName();
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension = $file->getClientOriginalExtension();
                        $fileNameToStore = $filename.'_'.date('Y-m-d').'.'.$extension;
                        $file->storeAs('course-material', $fileNameToStore);
                        CourseMaterials::create([
                            'slug' => RandomString(8),
                            "courseSlug" => $request->input("courseSlug"),
                            "course_file" => $fileNameToStore,
                            "noteSlug" => $slug,
                        ]);
                    }
                }
            }
            createLog("Updated a Course Note with: $slug and Topic from  $previousTopic to ". $request->input('topic'));
            return redirect()->route('course.note.show',$slug)->with('success', 'You have updated the course note successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseNotes $courseNotes)
    {
        //
    }
}
