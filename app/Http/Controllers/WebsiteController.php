<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Courses, User, Programs, CourseAllocation, CourseAllocationHistories};
class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = Programs::orderBy('program_name', 'asc')->with('courses')->get();
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        return view('website.about');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contact()
    {
        
        return view('website.contact');
    }

    public function team()
    {
        
        return view('website.teams');
    }

    public function faq()
    {
        
        return view('website.faqs');
    }

    /**
     * Display the specified resource.
     */
    public function program()
    {
        $program = Programs::orderBy('program_name', 'asc')->with('courses')->get();
        return view('website.program')->with(
            ['programs' => $program]
        );
    }

    public function programShow($slug)
    {
        $program = Programs::where('slug', $slug)->with(['courses', 'allocations'])->first();
        if(!$program){
            return redirect()->back()->with("error", "Program details does not exists");
        }
        $courses = $program->courses()->orderBy('created_at', 'asc')->get();
        return view('website.programView')->with([
            'programs' => $program, 'courses' => $courses, 'slug' => $slug
        ]);
    }

    public function courses()
    {
        $courses = Courses::with(['program'])->orderBy('course_name', 'asc')->get();
        return view('website.courses')->with(
            ['courses' => $courses]
        );
    }

     public function courseShow($courseSlug, $programSlug)
    {
        $course = Courses::where(['slug' =>$courseSlug, 'programSlug' => $programSlug])->with('program')->first();
        if(!$course){
            return redirect()->back()->with("error", "Course details does not exists");
        }
       
        return view('website.courseView')->with([
            'course' => $course, 'courseSlug' => $courseSlug, 'programSlug' => $programSlug,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
