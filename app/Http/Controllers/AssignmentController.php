<?php

namespace App\Http\Controllers;

use App\Models\{Task, Courses, Assignment, CourseSubscription,CourseNotes};
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\{Auth};

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
        //
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
    public function store(Request $request, $noteSlug)
    {
        dd($request);
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
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
