<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Courses, User, Programs, CourseAllocation, CourseAllocationHistories};
use Illuminate\Support\Facades\{Redirect, Auth, Gate, Mail, Hash};
use Illuminate\Validation\Rules;
use App\Mail\{UserRegistrationNotification, ContactUs};

class WebsiteController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'unique:users,phone_number'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $name_parts = explode(" ", $request->full_name);
        $first_name = $name_parts[0];
        $last_name = isset($name_parts[1]) ? $name_parts[1] : '';
        $role = 'Student';
        $email = $request->input("email");
        $slug = RandomString(11);
        $users = User::create([
            "email" => $request->email,  "first_name" => $first_name,
            "last_name" => $last_name, "password" => bcrypt( $request->input("password")),
            "phone_number" => $request->input("phone_number"),
            "role" => $role, 'email_verified_at' => ' ',
            "status" => True, 'change_password' => false, 'slug' => $slug
        ]);
        //event(new Registered($user));
        $users->assignRole($role);
        $users->syncRoles([$role]);
        
        $details = [
            'user' => User::where('slug',$slug)->first(),
        ];
        Mail::to($email)->send(new UserRegistrationNotification($details));
        Auth::login($users);
        createLog($email . 'Created AN Account As a '. $role);
        return redirect(route('dashboard'));
    }
    public function checkEmail(Request $request)
    {
        $exists = User::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkPhone(Request $request)
    {
        $exists = User::where('phone_number', $request->phone_number)->exists();
        return response()->json(['exists' => $exists]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$program = Programs::orderBy('program_name', 'asc')->with('courses')->get();
        $services = collect(ourServices())->shuffle()->take(4);
        return view('welcome')->with([
            'services' => $services
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        $services = collect(ourServices())->shuffle()->take(9);
        return view('website.about')->with(['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contact()
    {
        
        return view('website.contact');
    }

    public function sendContactUs(Request $request)
    {
        $name = $request->input("full_name");
        $email = $request->input("email");
        $message = $request->input("message");
        $phone_number = $request->input("phone_number");
        $subject = $request->input("subject");

        $receiver = 'info@expertlinksolutions.org';
        $details = ['full_name' => $name, 'email' => $email, 'message' => $message, 'subject' => $subject, 'phone_number' => $phone_number];
        try{
            Mail::to($receiver)->cc(['tolajide74@gmail.com','support@expertlinksolutions.org'])->send( new ContactUs ($details));
            return redirect()->route('website.contactus')->with(
                ["success" => " We have received your message Successfully"
            ]);
        }catch(PDOException $e){

            return redirect()->route('website.contact')->with(
                ["error" => " Network Failure, Please try again later "
            ]);
        }
    }

    public function teams()
    {
        
        return view('website.teams');
    }

    public function faq()
    {  
        return view('website.faqs');
    }

    public function blog()
    {
        return view('website.blog');
    }

    public function partners()
    {
        return view('website.partners');
    }

    public function reviews()
    {
        return view('website.reviews');
    }

    /**
     * Display the specified resource.
     */
    public function program()
    {
        $program = Programs::orderBy('program_name', 'asc')->with('courses')->paginate(15);
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
        $courses = $program->courses()->orderBy('created_at', 'asc')->paginate();
        return view('website.programView')->with([
            'program' => $program, 'courses' => $courses, 'slug' => $slug
        ]);
    }

    public function courses()
    {
        $courses = Courses::with(['program'])->orderBy('course_name', 'asc')->paginate(24);
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
    public function seevices()
    {
        $services = ourServices();
        return view('website.seevices')->with(['services' => $services]);
    }

    public function seeviceDetails($link)
    {
        $services = ourServices();
        $service = collect($services)->firstWhere('link', $link);
        if (!$service) {
            return redirect()->back()->with("error", "Service not found");
        }
        return view('website.seevicesDetails')->with(['service' => $service, 'services' => $services]);
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
