<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;use Str; use Session;
use Illuminate\Support\Facades\Hash;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function show()
    {
       if (Auth::check()) {
            session(['locked' => true]);
            return view('auth.locked', ['user' => Auth::user()]);
        }
        Session::forget('cart');
        Auth::logout();
        return redirect()->route('login');
    }


    public function unlock(Request $request)
{
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors([
                'auth' => 'Your session has expired. Please log in again.'
            ]);
        }

        $user = Auth::user();
        $routes = session('visited_routes', []);

        if (Hash::check($request->password, $user->password)) {
            $request->session()->reflash(); // keep flashed inputs
            session()->forget('locked');
            $excludedRoutes = [
                'lock.screen','unlock','login','createAccount','Check.email','Check.phone',
                'website','website.aboutus','website.contactus','website.sendContactUs',
                'website.faq','website.blog','website.partner','website.review','website.teams',
                'website.services','website.seeviceDetails','website.programs','website.programs.show',
                'website.programs.courseShow','website.courses','website.courseDetails'
            ];
            $lastValid = collect($routes)->reverse()->first(function ($route) use ($excludedRoutes) {
                return isset($route['route']) && !in_array($route['route'], $excludedRoutes);
            });

            $redirectUrl = $lastValid['url'] ?? route('home');
            return redirect($redirectUrl)->withInput();
        }

        return back()->withErrors(['password' => 'Incorrect user password']);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
