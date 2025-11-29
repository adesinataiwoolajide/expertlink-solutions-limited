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
        $user = Auth::user();
        $routes = session('visited_routes', []);
        if (Hash::check($request->password, $user->password)) {
            $request->session()->reflash();
            session()->forget('locked');

            $excluded = [
                '-screen', 'login', 'signin', 'clear-cache', 'register', 'forgot-password',
                'create-account', 'Check-Email', 'Check-Phone', '/', 'aboutus', 'contactus',
                'sendContactUs', 'faq', 'blogs', 'partners', 'reviews', 'our-teams',
                'our-services', 'programs', 'courses', 'our-courses'
            ];

            $lastValidUrl = collect($routes)->reverse()->first(function ($route) use ($excluded) {
                foreach ($excluded as $needle) {
                    if (Str::contains($route['url'], $needle)) {
                        return false;
                    }
                }
                return true;
            });

            $redirectUrl = $lastValidUrl['url'] ?? route('home');
            return redirect($redirectUrl)->withInput(); // rehydrate form inputs
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
