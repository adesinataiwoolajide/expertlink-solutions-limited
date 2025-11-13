<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\{Courses, User, Programs, CourseAllocation, CourseAllocationHistories};
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:Administrator|Admin|Instructor|Student');
    }

    public function index(){
        $user = Auth::user();
        if($user->status == 0){
            Auth::logout();
            return redirect()->route('login')->with([
                'error' => 'Your account has been suspended, Please kindly conttact the administrator',
            ]);
        }
        $user->syncRoles([$user->role]);
        $totalPrograms = Programs::count();
        $totalCourses = Courses::count();
        $totalInstructors = User::where('role', 'Instructor')->count();
        if(Auth::user()->hasAnyRole(['Administrator',"Admin"])){
           
            $totalUsers = User::count();
            $totalAllocations = CourseAllocation::count();
            $totalAllocationHistories = CourseAllocationHistories::count();

            return view('dashboard')->with([
                'success' => "Dear {$user->first_name}, welcome to your {$user->role} dashboard.",
                'totalUsers' => $totalUsers,
                'totalPrograms' => $totalPrograms,
                'totalCourses' => $totalCourses,
                'totalAllocations' => $totalAllocations,
                'totalAllocationHistories' => $totalAllocationHistories,
                'totalInstructors' => $totalInstructors,
            ]);
        }elseif(Auth::user()->hasAnyRole(['Instructor'])){
            
            $totalAllocations = CourseAllocation::where('userSlug', $user->slug)->count();
            $totalAllocationHistories = CourseAllocationHistories::where('previousUserSlug', $user->slug)
            ->orwhere('newUserSlug', $user->slug)->count();
            return view('dashboard')->with([
                'success' => "Dear {$user->first_name}, welcome to your {$user->role} dashboard.",
                'totalPrograms' => $totalPrograms,
                'totalCourses' => $totalCourses,
                'totalAllocations' => $totalAllocations,
                'totalAllocationHistories' => $totalAllocationHistories,
                'totalInstructors' => $totalInstructors,
            ]);

        }elseif(Auth::user()->hasAnyRole(['Student'])){

            return view('dashboard')->with([
                'success' => "Dear {$user->first_name}, welcome to your {$user->role} dashboard."
            ]);

        }else{
            Auth::logout();
            return redirect()->back()->withInput()->with([
                'error' => 'Please kindly use a valid login credentials',
            ]);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route("login");
        }else{
            return redirect()->route('dashboard');
        }

    }
}
