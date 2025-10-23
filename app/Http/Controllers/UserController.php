<?php

namespace App\Http\Controllers;

use App\Models\{Log, User, Role};
use Illuminate\Http\Request;
use App\Http\Requests\{StoreUserRequest, UpdateUserRequest, UpdateChangePasswordRequest};
use Illuminate\Support\Facades\{Redirect, Auth, Gate, Mail, Hash};
use App\Mail\{UserRegistrationNotification};
use App\Repositories\GeneralRepository;
use Str; use DB;
use Illuminate\Routing\Controllers\{HasMiddleware,Middleware};
class UserController extends Controller implements HasMiddleware
{
    protected $model;
    public static function middleware(): array
    {
        return [
            'auth', new Middleware('role:Administrator|Admin|Student'),
        ];
    }
    public function __construct(User $user){
        $this->model = new GeneralRepository($user);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->hasAnyRole(['Administrator',"Admin"])){

            return view('home.users.index')->with([
                'users' => User::where('role', '!=', 'Student')->orderBy('first_name', 'asc')->get()
            ]);
            
        }else{
            return view('home.users.index')->with([
                'users' => User::where('id', Auth::id())->orderBy('first_name', 'asc')->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->hasAnyRole(['Administrator'])){

            return view('home.users.create')->with([
                'roles' => Role::where('name', '!=', 'Student')->orderBy('name', 'asc')->get(),
            ]);

        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if(Auth::user()->hasAnyRole(['Administrator'])){
            $request->user()->fill($request->validated());
            $email = $request->input("email");
            $role = $request->input("role");
            $slug = RandomString(7);
            if ((Str::contains($email, 'expertlinksolutions')) || (Str::contains($email, 'gmail.com'))) {
                $users = new User([
                    "email" => $request->input("email"),
                    "first_name" => $request->input("first_name"),
                    "last_name" => $request->input("last_name"),
                    "password" => bcrypt( $request->input("phone_number")),
                    "phone_number" => $request->input("phone_number"),
                    "role" => $request->input("role"), 'email_verified_at' => now(),
                    "status" => True, 'change_password' => false, 'slug' => $slug
                ]);

                if ($users->save()) {
                    $users->assignRole($role);
                    $users->syncRoles([$role]);
                    
                    createLog('Added ' . $request->input("email") . ' As an '. $role);
                    $message = "You Have Added ". $request->input("email") . " as an $role Successfully";
                    
                    $details = [
                        'user' => User::where('slug',$slug)->first(),
                    ];
                    //Mail::to($email)->send(new UserRegistrationNotification($details));
                    return redirect()->route('user.show',$slug)->with("success", "You have created the user successfully");
                }else{
                    return redirect()->back()->with("error", "Network Failure, Please try again later");
                }
            }else{
                return redirect()->back()->withInput()->with([
                    'error' => 'Please kindly use a valid official email address',
                ]);
            }
        }else{
            $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
            return view('errors.403')->with(['message' => $message]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        if(User::where(['slug' => $slug])->exists()){
            if(Auth::user()->hasAnyRole(['Administrator'])){
                $user = User::where(["slug" => $slug,])->first();
                $roles = Role::orderBy('name', 'asc')->get();
            }else{
                $user = User::where(["slug" => Auth::user()->slug])->first();
                $roles = Role::where('name', Auth::user()->role)->get();
            }
            $role = Role::where('name', $user->role)->first();
            $groupsWithRoles = $role->getPermissionNames();
            $permission = DB::table('role_has_permissions')->where([
                'role_id' => $role->id
            ])->get();

            $model = DB::table('model_has_permissions')->where([
                'model_id' => $user->id
            ])->get();
            return view('home.users.show')->with([
                'roles' => $roles,
                'user' => $user, 'groupsWithRoles' => $groupsWithRoles,
                'model' => $model, 'permission'=>$permission
            ]);
        }else{
            return redirect()->back()->with([
                'error' => $slug. " does not exits for any user",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    public function changingPassword(UpdateChangePasswordRequest $request, $slug){
        
        $request->user()->fill($request->validated());
        $password = $request->input("password");
        $email = $request->input("email");
        
        if(User::where(['slug' => Auth::user()->slug])->exists()) {
            
            $log = new Log([
                "user_id" => Auth::user()->id,
                "activities" => 'Changed Password for User: ' . $slug,
                'ip_address' => getIPAddress(),
            ]);
            if(Auth::user()->hasAnyRole(['Administrator','Admin'])){
                $details = User::where('slug', $slug)->first();
                if($details->fill(['password' => bcrypt($request->password)])->save()){
                    $log->save();
                    return redirect()->back()->with(['success' => 'Password changed successfully']);
                }else{
                    return redirect()->back()->with([
                        'error' => 'Network failure, Please try again later'
                    ]);
                }
            }else{
                $details = User::where('slug', Auth::user()->slug)->first();
                if (Hash::check($request->old_password, $details->password)) {
                    $details->fill(['password' => bcrypt($request->password)])->save();
                    $log->save();
                    Auth::logout();
                    return redirect()->route('login')->with(['success' => 'Password changed successfully, Please kindly login using the new password']);
                } else {
                    return redirect()->back()->with([
                        'error' => 'Invalid Old Password'
                    ]);
                    
                }
            }

        }else{
            return redirect()->back()->with([
                'error' => $slug. " does not exits for any user on the portal",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $slug)
    {
        if(User::where(['slug' => $slug])->exists()){
            $request->user()->fill($request->validated());
            $email = $request->input("email");
            $role = $request->input("role");
            $user = User::where(['slug' => $slug])->first();
            if ((Str::contains($email, 'ibbu.edu.ng')) || (Str::contains($email, 'gmail.com'))) {
                
                $data = User::where(['slug' => $slug])->update([
                    "email" => $request->input("email"),
                    "first_name" => $request->input("first_name"),
                    "last_name" => $request->input("last_name"),
                    "phone_number" => $request->input("phone_number"),
                    "role" => $request->input("role"),
                ]);
                
                $user_id = $user->id;
                if($data){
                    DB::table('model_has_roles')->where('model_id', $user_id)->delete();
                    $user->assignRole($role);
                    $message = "You Have Updated The User Successfully";
                    $log = new Log([
                        "user_id" => Auth::user()->id,
                        "activities" => "Updated User ID: $slug Details",
                        'ip_address' => getIPAddress(),
                    ]);
                    $log->save();
                    return redirect()->back()->with([
                        "success" => $message
                    ]);
                }else{
                    return redirect()->back()->with("error", "Network Failure, Please try again later");
                }
            }else{
                return redirect()->back()->withInput()->with([
                    'error' => 'Please kindly use a valid official email address',
                ]);
            }
        }else{
            $message = "This Email: $slug could not be associated with any User on the Portal";
            return view('errors.404')->with(['message' => $message]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($email)
    {
        if(User::where(['email' => $email])->exists()){
            $use = User::where(["email" => $email])->first();
            $user =  $this->model->show($use->id);
            if ($user->delete($user->id)) {

                $user->removeRole($user->role);
                $log = new Log([
                    "user_id" => Auth::user()->id,
                    "activities" => 'Deleted ' . $email . ' As an '. $use->role,
                    'ip_address' => getIPAddress(),
                ]);
                $log->save();
                return redirect()->back()->with([
                    'success' => "You Have Deleted $email From The User Details Successfully",
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => "Network failure, Please try again later",
                ]);
            }
        }else{
            $message = "This Email: $email could not be associated with any Admin User on the Portal";
            return view('errors.404')->with(['message' => $message]);
        }
    }

     public function suspend($slug)
    {
        if(User::where(['slug' => $slug])->exists()){
            if (Auth::user()->hasAnyRole(['Administrator'])) {
                $use = User::where(["slug" => $slug,])->first();
                $updat = User::where('slug', $slug)->update(["status" => 0,]);
                if ($updat) {
                    return redirect()->back()->with([
                        'success' => "$use->email Account has been Suspended Successfully",
                    ]);
                }else{
                    return redirect()->back()->with([
                        'error' => "Network failure, Please try again later",
                    ]);
                }
            }else{
                $message = 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal';
                return view('errors.403')->with(['message' => $message]);
            }
        }else{
            return redirect()->back()->with([
                'error' => $slug. " does not exits for any user",
            ]);
        }
    }

    public function unsuspend($slug)
    {
        if(User::where(['slug' => $slug])->exists()){
            if (Auth::user()->hasAnyRole(['Administrator'])) {
                $use = User::where(["slug" => $slug,])->first();
                $updat = User::where('slug', $slug)->update(["status" => 1,]);
                if ($updat) {
                    return redirect()->back()->with([
                        'success' => "$use->email Account has been Activated Successfully",
                    ]);
                }else{
                    return redirect()->back()->with([
                        'error' => "Network failure, Please try again later",
                    ]);
                }
            } else {
                return redirect()->back()->with([
                    'error' => "You Dont have Access To Un Suspend A User",
                ]);
            }
        }else{
            return redirect()->back()->with([
                'error' => $slug. " does not exits for any user",
            ]);
        }
    }
}
