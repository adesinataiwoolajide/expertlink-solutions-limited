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

        $data = new CourseNotes([
            'slug'            => RandomString(8), // or use a custom slug generator
            'topic'           => $request->input('topic'),
            'content'         => $request->input('content') ?: 'NULL',
            'title'           => $request->input('title') ?: 'NULL',
            'chapter'         => $request->input('title'),

            'link_one'        => $request->input('link_one') ?? 'N/A',
            'link_two'        => $request->input('link_two') ?? 'N/A',
            'link_three'      => $request->input('link_three') ?? 'N/A',
            'link_four'       => $request->input('link_four') ?? 'N/A',

            'status'          => 0,
            'instructorSlug'  => Auth::user()->slug ?? 'unknown',
            'allocatonSlug'   => $request->input('allocationSlug'),
            'courseSlug'      => $request->input('courseSlug'),
            'programSlug'     => $request->input('programSlug'),
        ]);
        dd($data);
        if($request->hasFile('material')) {
            $file = $request->material;
            foreach ($file as $files) {
                $filenameWithExt = $files->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.date('Y-m-d').'.'.$extension;
                $path=$files->move('elsAdmin/course-material/', $fileNameToStore);
                $material = new CourseMaterials ([
                    "course_id" => $request->input("course_id"),
                    "course_file" => $fileNameToStore,
                    "note_id" => $note_id,
                ]);
                $material->save();
            }

            return redirect()->route('course.note.index',[$course_id])->with(["success" => $message]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseNotes $courseNotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseNotes $courseNotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseNoteRequest $request, CourseNotes $courseNotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseNotes $courseNotes)
    {
        //
    }
}
