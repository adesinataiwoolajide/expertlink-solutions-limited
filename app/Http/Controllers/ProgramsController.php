<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Programs};
use Illuminate\Support\Facades\{Auth};
use App\Repositories\GeneralRepository;
use App\Http\Requests\{StoreProgramRequest, UpdateProgramRequest};
use Illuminate\Support\Facades\{App, File};
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
    public function update(UpdateProgramRequest $request, $slug)
    {
        
        $program = Programs::where('slug', $slug)->first();
        if(!$program){
            return redirect()->back()->with("error", "Program details does not exists");
        }
       
        $request->user()->fill($request->validated());
        $previous_name = $request->input("previous_name");
        $program_name = $request->input("program_name");
        if ($request->hasFile('banner') && $request->file('banner')->isValid()) {
            $uploadFile = $request->file('banner');
            $folderName = 'program-banner';
            $publicPath = App::environment('local') ? public_path($folderName) : base_path($folderName);
            if (!File::exists($publicPath)) {
                File::makeDirectory($publicPath, 0777, true, true);
            }
            $safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', $program->program_name);
            $pngFileName = $safeName . '_' . Str::random(6) . '.' . $uploadFile->getClientOriginalExtension();
            $pngPath = $publicPath . DIRECTORY_SEPARATOR . $pngFileName;
            try {
                $uploadFile->move($publicPath, $pngFileName);
                $program->banner = $pngFileName;
            } catch (\Exception $e) {
                throw new \Exception('File move failed: ' . $e->getMessage());
            }
        }
        $program->program_name = $program_name;
        $program->save();
        createLog( "Updated Progam with Slug: $slug details and Changed the program name from $previous_name to $program_name");
        $message = "You Have updated ". $request->input("program_name") . " Successfully";
        return redirect()->route("program.index")->with(["success" => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programs $programs)
    {
        //
    }
}
