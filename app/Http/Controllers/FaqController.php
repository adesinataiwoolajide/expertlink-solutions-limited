<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\{StoreFaqRequest, UpdateFaqRequest};
use Illuminate\Support\Facades\{Auth};
use App\Repositories\GeneralRepository;
use Illuminate\Routing\Controllers\{HasMiddleware,Middleware};
class FaqController  extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth', new Middleware('role:Administrator|Admin|Instructor'),
        ];
    }
    public function __construct(Faq $faq){
        $this->model = new GeneralRepository($faq);
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
    public function store(StoreFaqRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
