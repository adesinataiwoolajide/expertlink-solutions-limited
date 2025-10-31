<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\{User};

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
           
            return view('dashboard')->with([
                
                'success' => "Dear ". Auth::user()->first_name ." Wellcome to ". Auth::user()->role. " Dashboard"
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
