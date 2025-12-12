<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
class SocialAuthController extends Controller
{
    // ---------------- GOOGLE ----------------
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->scopes([
            'openid','email','profile','https://www.googleapis.com/auth/user.phonenumbers.read'
        ])->redirect();

    }

    public function handleGoogleCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Unable to login with Google.');
        }

        $fullName = $socialUser->getName();
        $nameParts = explode(' ', $fullName, 2);
        $first_name = $nameParts[0] ?? '';
        $last_name  = $nameParts[1] ?? '';
        $role = 'Student';
        $slug =  RandomString(8);
        $user = User::firstOrCreate(
        ['email' => $socialUser->getEmail()],
            [
                'first_name'       => $first_name,
                'last_name'        => $last_name,
                'password'         => bcrypt(str()->random(16)),
                'role'             => $role,
                'email_verified_at'=> now(),
                'status'           => true,
                'change_password'  => false,
                'slug'             =>$slug,
                'phone_number' => $socialUser->getId()
            ]
        );
        Auth::login($user);
        $user->assignRole($role);
        $user->syncRoles([$role]);
        return redirect()->route('myCourses')->with('success', 'Logged in with Google successful');
    }

    // ---------------- FACEBOOK ----------------
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->scopes(['email'])->redirect();

    }

    public function handleFacebookCallback()
    {
        try {
            $socialUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Unable to login with Facebook.');
        }
        dd($socialUser->getName());
        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'facebook_id' => $socialUser->getId(),
                'password' => bcrypt(str()->random(16)),
            ]
        );

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Logged in with Facebook');
    }

    // ---------------- GITHUB ----------------
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $socialUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Unable to login with GitHub.');
        }
        $fullName = $socialUser->getName() ?? $socialUser->getNickname();
        $nameParts = explode(' ', $fullName, 2);
        $first_name = $nameParts[0] ?? '';
        $last_name  = $nameParts[1] ?? '';
        $role = 'Student';
        $slug = RandomString(8);
        $email = $socialUser->getEmail() ?? ($socialUser->getId() . '@github.local');
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'first_name'       => $first_name,
                'last_name'        => $last_name,
                'password'         => bcrypt(str()->random(16)),
                'role'             => $role,
                'email_verified_at'=> now(),
                'status'           => true,
                'change_password'  => false,
                'slug'             => $slug,
                'phone_number'     => $socialUser->getId(), // storing GitHub ID like Google
            ]
        );
        Auth::login($user);
        $user->assignRole($role);
        $user->syncRoles([$role]);
        return redirect()->route('myCourses')->with('success', 'Logged in with GitHub successful');
    }
}