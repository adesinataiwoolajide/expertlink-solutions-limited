<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionLocked
{
    public function handle($request, Closure $next)
    {
        if (session('locked') && Auth::check()) {
            if ($request->method() === 'GET') {
                session(['url.intended' => $request->fullUrl()]);
            }

            if ($request->method() === 'POST') {
                $request->flash(); // preserve form inputs
                return redirect()->route('lock.screen');
            }

            return redirect()->route('lock.screen');
        }

        return $next($request);
    }
}