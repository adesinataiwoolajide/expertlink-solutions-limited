<?php

namespace App\Http\Controllers;

use App\Models\{Courses, CourseRatings};
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\{Auth};

class CourseRatingsController extends Controller
{
    protected $model;
    public function __construct(CourseRatings $courses)
    {
        $this->middleware('auth');
        $this->middleware('role:Administrator|Admin|Student');
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
    public function create($slug)
    {
         if(Auth::user()->hasAnyRole(['Administrator',"Student"])){

            $course = Courses::where('slug', $slug)->with('allocation', 'courseSubscriptions', 'notes', 'tasks', 'assignments', 'tasksubmission', 'submissions')->first();
            if(!$course){
                return redirect()->back()->with("error", "Course details does not exists");
            }
            dd($course);
            
        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasAnyRole(["Student"])){

            $request->validate([
                'ratingScore'   => 'required|integer|min:1|max:10',
                'courseSlug'    => 'required|string',
                'ratingComment' => 'nullable|string|max:500',
            ]);
            $ratingScore = $request->input('ratingScore');
            $courseSlug  = $request->input('courseSlug');
            $studentSlug = Auth::user()->slug;
            $slug        = RandomString(9);
            CourseRatings::create([
                'slug'          => $slug,
                'ratingScore'   => $ratingScore,
                'studentSlug'   => $studentSlug,
                'courseSlug'    => $courseSlug,
                'ratingComment' => $request->input('ratingComment'),
                'ratingStatus' => false,
            ]);
            return redirect()->back()->with('success', 'Your rating has been submitted successfully!');
        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $slug)
    {
        $course = Courses::where('slug', $slug)->firstOrFail();
        $query = CourseRatings::where('courseSlug', $slug);

        if ($request->minRating) {
            $query->where('ratingScore', $request->minRating);
        }

        $ratings = $query->get();

        $labels = range(1, 10);
        $counts = [];
        foreach ($labels as $i) {
            $counts[] = $ratings->where('ratingScore', $i)->count();
        }

        return response()->json([
            'average'      => view('home.courses.average_rating', compact('ratings'))->render(),
            'list'         => view('home.courses.ratings_list', compact('ratings'))->render(),
            'counter'      => 'Showing ' . $ratings->count() . ' rating(s)',
            'labels'       => $request->minRating ? [] : $labels,   // only send if All
            'counts'       => $request->minRating ? [] : $counts,   // only send if All
        ]);

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseRatings $courseRatings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseRatings $courseRatings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseRatings $courseRatings)
    {
        //
    }
}
