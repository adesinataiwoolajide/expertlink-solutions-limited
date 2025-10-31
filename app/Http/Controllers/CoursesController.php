<?php

namespace App\Http\Controllers;

use App\Models\{Programs, Courses};
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;

use App\Http\Requests\{StoreCourseRequest, UpdateCourseRequest};

use Illuminate\Routing\Controllers\{HasMiddleware,Middleware};
use Illuminate\Support\Facades\{Auth};
class CoursesController extends  Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth', new Middleware('role:Administrator|Admin|Instructor'),
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
        $program = Programs::orderBy('program_name', 'asc')->get();
        if(Auth::user()->hasAnyRole(['Administrator',"Admin"])){
            return view('home.courses.index')->with([
                'programs' => $program
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
        $banner = $request->file('banner');
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
        
        $data = new Courses([
            'slug' => RandomString(10),
            'course_name' => $course_name,
            'course_price' => $course_price,
            'programSlug' => $program_name,
            'user_id' => $user_id,
            'banner' => "no-file", 
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
            createLog( 'Added ' . $$course_name . ' to the course list ');
            $message = "You Have Added ". $$course_name . " to the course list Successfully";
            return redirect()->route("course.index")->with(["success" => $message]);
        }else{
            return redirect()->back()->with("error", "Network Failure, Please try again later");
        }

    } 
    
    /**
     * Display the specified resource.
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdateCourseRequest $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Courses $courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $courses)
    {
        //
    }
}
