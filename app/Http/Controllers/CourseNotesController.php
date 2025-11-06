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
    public function index($courseSlug)
    {
        $course = Courses::where('slug', $courseSlug)->with('program', 'allocations', 'materials', 'notes')->first();
        if(!$course){
            return redirect()->back()->with("error", "Course details does not exists");
        }
        $notes = $course->notes()->with('materials', 'allocation', 'instructor')->orderBy('created_at', 'desc')->paginate(20);
        $allocation = $course->allocations();
        
        return view('home.notes.index')->with([
            'course' => $course, 'allocation' => $allocation
        ]);
        
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
            'programSlug'   => $request->input('programSlug'), 'addedByUserSlug' => Auth::user()->slug
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
                            "noteSlug" => $slug, 'addedByUserSlug' => Auth::user()->slug
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
                            "noteSlug" => $slug, 'addedByUserSlug' => Auth::user()->slug
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
    public function destroy($slug)
    {
        if(Auth::user()->hasAnyRole(['Administrator'])){
            $notes = CourseNotes::where('slug', $slug)->first();
            if(!$notes){
                return redirect()->back()->with('error', 'No course note was found.');
            }
            $materials = $notes->materials()->orderBy('created_at', 'desc')->get();
            $courseSlug = $notes->courseSlug;
            if($notes->delete()){
                foreach ($materials as $material) {
                    $file = 'storage/course-material/' . $material->course_file;
                    $mate = $notes->materials()->where('slug', $material->slug)->first();
                    if (file_exists($file)) {
                        if(($mate->delete()) && (unlink($file))){
                            unlink($file);
                            createLog("Deleted Course Material with ID: $mate->slug");
                        }
                    }
                }
                createLog("Deleted Course Note with topic: $notes->topic and ID: $notes->slug");
                return redirect()->route('course.note.index',$courseSlug)->with('success', 'Course note deleted successfully.');

            }else{
                return redirect()->back()->with('error', 'Course note could not be deleted at the moment, please try again later.');
            }
        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

    public function restore($slug)
    {
        $notes = CourseNotes::withTrashed()->where('slug', $slug)->first();
        if ($notes) {
            createLog( "Restores Course Note with Topic $notes->topic with Slug: $slug details from the Bin");
            $notes->restore();
            return redirect()->back()->with('success', 'COurse Note restored from the Bin successfully!');
        }
        return redirect()->back()->with('error', 'Program not found.');
    }

    public function destroyNote($slug)
    {
        if(Auth::user()->hasAnyRole(['Administrator'])){
            $materials = CourseMaterials::where('slug', $slug)->first();
            if(!$materials){
                return redirect()->back()->with('error', 'This course material was not found.');
            }
            $file = 'storage/course-material/'.$materials->course_file;
            if (file_exists($file)) {
                if(($materials->delete()) && (unlink($file))){
                    createLog("Deleted Course Material with ID: $slug");
                    return redirect()->back()->with('success', 'Course material deleted successfully.');
                }else{
                    return redirect()->back()->with('error', 'Course material could not be deleted at the moment, please try again later.');
                }
            }else{
                return redirect()->back()->with('error', 'Course material does not exist.');
            }
        }else{
        
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        
        }
    }
}
