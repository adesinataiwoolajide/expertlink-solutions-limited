<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Log, Programs};
use Illuminate\Support\Facades\{Auth};
use App\Repositories\GeneralRepository;
use App\Http\Requests\{StoreProgramRequest, UpdateProgramRequest};

use Str; use DB;
use Illuminate\Routing\Controllers\{HasMiddleware,Middleware};
class ProgramsController extends Controller implements HasMiddleware
{
    protected $model;
    public static function middleware(): array
    {
        return [
            'auth', new Middleware('role:Administrator|Admin'),
        ];
    }
    public function __construct(Programs $program){
        $this->model = new GeneralRepository($program);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = Programs::orderBy('program_name', 'asc')->get();
        return view("home.programs.index")->with([
            "programs" => $program,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function checkProgramName(Request $request)
    {
        $exists = Programs::where('program_name', $request->program_name)->exists();
        return response()->json(['exists' => $exists]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $request->user()->fill($request->validated());
        $program_name = $request->input("program_name");
        $file = createFileUpload('program-banner', $request->file('banner'), $program_name);
        $data =  new Programs([
            'slug' => RandomString(9),
            "program_name" => $program_name,
            "banner" => $file['png']
        ]);
        
        if ($data->save()) {
            createLog( 'Added ' . $request->input("program_name") . ' to the program list ');
            $message = "You Have Added ". $request->input("program_name") . " to the program list Successfully";
            return redirect()->route("program.index")->with(["success" => $message]);
        }else{
            return redirect()->back()->with("error", "Network Failure, Please try again later");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Programs $programs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programs $programs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programs $programs)
    {
        //
    }
}
