<?php

namespace App\Http\Controllers;

use App\Models\{Programs, Courses, User, CourseAllocationHistories};
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;

use App\Http\Requests\{StoreCourseRequest, UpdateCourseRequest};
use Illuminate\Support\Facades\{App, File};
use Illuminate\Routing\Controllers\{HasMiddleware,Middleware};
use Illuminate\Support\Facades\{Auth};
class CoursesController extends  Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth', new Middleware('role:Administrator|Admin|Instructor|Instructor'),
        ];
    }
    public function __construct(Courses $courses){
        $this->model = new GeneralRepository($courses);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Courses::with(['user', 'program'])->orderBy('course_name', 'asc')->get();
        if(Auth::user()->hasAnyRole(['Administrator',"Admin", "Instructor"])){
            return view('home.courses.index')->with([
                'courses' => $courses
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
        $program = Programs::orderBy('program_name', 'asc')->get();
        if(Auth::user()->hasAnyRole(['Administrator',"Admin"])){
            return view('home.courses.create')->with([
                'programs' => $program
            ]);
        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

     public function checkCourseName(Request $request)
    {
        $exists = Courses::where('course_name', $request->course_name)->exists();
        return response()->json(['exists' => $exists]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {

        $request->user()->fill($request->validated());
        $course_name = $request->input('course_name');
        $course_price = $request->input('course_price');
        $user_id = Auth::id();
        $program_name = $request->input('program_name');
        $basic_requirements = $request->input('basic_requirements');
        $course_outline = $request->input('course_outline');
        $learning_module = $request->input('learning_module');
        $course_schedule = $request->input('course_schedule');
        $training_type = $request->input('training_type'); // This is an array
        $payment_structure = $request->input('payment_structure');
        $course_overview = $request->input('course_overview');
        $course_technologies = $request->input('course_technologies');
        $packages_included = $request->input('packages_included');
        $benefits = $request->input('benefits');
        $slug = RandomString(10);
        $data = new Courses([
            'slug' =>$slug,
            'course_name' => $course_name,
            'course_price' => $course_price,
            'programSlug' => $program_name,
            'user_id' => $user_id,
            'banner' => "els.png", 
            'basic_requirements' => $basic_requirements,
            'course_outline' => $course_outline,
            'learning_module' => $learning_module,
            'course_schedule' => $course_schedule,
            'training_type' => json_encode($training_type),
            'payment_structure' => $payment_structure,
            'course_overview' => $course_overview,
            'course_technologies' => $course_technologies,
            'packages_included' => $packages_included,
            'benefits' => $benefits,
        ]);

        if ($data->save()) {
            if ($request->hasFile('banner')) {
                $file = createFileUpload('course-banner', $request->file('banner'), $request->input('course_name'));
                $data->banner = $file['png'];
            }
            
            createLog( 'Added ' . $course_name . ' to the course list ');
            $message = "You Have Added ". $course_name . " to the course list Successfully";
            return redirect()->route("course.index")->with(["success" => $message]);
        }else{
            return redirect()->back()->with("error", "Network Failure, Please try again later");
        }

    } 
    
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $course = Courses::where('slug', $slug)->with('program', 'allocations')->first();
        if(!$course){
            return redirect()->back()->with("error", "Course details does not exists");
        }
        if(Auth::user()->hasAnyRole(['Administrator',"Admin", "Instructor"])){
            $program = Programs::orderBy('program_name', 'asc')->get();
            $selectedTypes = is_array($course->training_type) ? $course->training_type : json_decode($course->training_type, true);
            if(!$course->program){
                $program_name= "NIL"; 
            }else{
                $program_name = $course->program->program_name;
            }
            $users = User::where(['role' => 'Instructor', 'status' => 1])->orderBy('first_name', 'asc')->get();
            $allocations = $course->allocations()->with(['user', 'allocationHistory'])->orderBy('created_at','desc')->get();
            if ($allocations->isNotEmpty()) {

                $allocation = $allocations->first();
                $history = CourseAllocationHistories::where('allocationSlug', $allocation->slug)->with(['previousUser', 'newUser', 'addedBy'])->orderBy('created_at', 'desc')->get();
            }else{
               $history = collect();  
            }
            //$allocationHistory = $allocations->pluck('allocationHistory')->filter()->sortByDesc('created_at');
            return view('home.courses.show')->with([
                'programs' => $program, 'course' => $course, 'selectedType' => $selectedTypes, 'program_name' => $program_name,
                'users' => $users, 'allocations' => $allocations, 'allocationHistories' => $history
            ]);
        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $course = Courses::where('slug', $slug)->with('program')->first();
        if(!$course){
            return redirect()->back()->with("error", "Course details does not exists");
        }
        $program = Programs::orderBy('program_name', 'asc')->get();
        if(Auth::user()->hasAnyRole(['Administrator',"Admin"])){
            $selectedTypes = is_array($course->training_type) ? $course->training_type : json_decode($course->training_type, true);
            if(!$course->program){
                $program_name= "NIL"; 
            }else{
                $program_name = $course->program->program_name;
            }
            return view('home.courses.edit')->with([
                'programs' => $program, 'course' => $course, 'selectedType' => $selectedTypes, 'program_name' => $program_name
            ]);
        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, $slug)
    {
        $request->user()->fill($request->validated());
        $course = Courses::where('slug', $slug)->with('program')->first();
        if(!$course){
            return redirect()->back()->with("error", "Course details does not exists");
        }
        $course_name = $request->input('course_name');
        $course_price = $request->input('course_price');
        $user_id = Auth::id();
        $program_name = $request->input('program_name');
        $basic_requirements = $request->input('basic_requirements');
        $course_outline = $request->input('course_outline');
        $learning_module = $request->input('learning_module');
        $course_schedule = $request->input('course_schedule');
        $training_type = $request->input('training_type'); // This is an array
        $payment_structure = $request->input('payment_structure');
        $course_overview = $request->input('course_overview');
        $course_technologies = $request->input('course_technologies');
        $packages_included = $request->input('packages_included');
        $benefits = $request->input('benefits');
        $previous_name = $request->input("previous_name");
        $data = ([
            "course" => $this->model->show($course->course_id),
            'slug' =>$slug,
            'course_name' => $course_name,
            'course_price' => $course_price,
            'programSlug' => $program_name,
            'user_id' => $user_id,
            'banner' => $course->banner, 
            'basic_requirements' => $basic_requirements,
            'course_outline' => $course_outline,
            'learning_module' => $learning_module,
            'course_schedule' => $course_schedule,
            'training_type' => json_encode($training_type),
            'payment_structure' => $payment_structure,
            'course_overview' => $course_overview,
            'course_technologies' => $course_technologies,
            'packages_included' => $packages_included,
            'benefits' => $benefits,
        ]);

        if($this->model->update($data, $course->course_id)){
            if ($request->hasFile('banner')) {
                $file = createFileUpload('course-banner', $request->file('banner'), $course_name);
                Courses::where('slug', $slug)->update([ 'banner' => $file['png']]);
            }
            createLog( "Updated Course Name with Slug: $slug details and Changed the Course name from $previous_name to $course_name");
            $message = "You Have updated ". $request->input("program_name") . " Successfully";
            return redirect()->route("course.show",$slug)->with(["success" => $message]);
        }else{
            return redirect()->back()->with("error", "Network Failure, Please try again later");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $courses)
    {
        //
    }
}
