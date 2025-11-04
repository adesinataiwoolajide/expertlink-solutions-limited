<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\{Courses, User, Programs, CourseAllocation, CourseAllocationHistories};

class HomeController extends Controller
{
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('role:Administrator|Admin'),
        ];
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
        if(Auth::user()->hasAnyRole(['Administrator'])){
           
            $totalUsers = User::count();
            $totalPrograms = Programs::count();
            $totalCourses = Courses::count();
            $totalAllocations = CourseAllocation::count();
            $totalAllocationHistories = CourseAllocationHistories::count();
            $totalInstructors = User::where('role', 'Instructor')->count();

            return view('dashboard')->with([
                'success' => "Dear {$user->first_name}, welcome to your {$user->role} dashboard.",
                'totalUsers' => $totalUsers,
                'totalPrograms' => $totalPrograms,
                'totalCourses' => $totalCourses,
                'totalAllocations' => $totalAllocations,
                'totalAllocationHistories' => $totalAllocationHistories,
                'totalInstructors' => $totalInstructors,
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
