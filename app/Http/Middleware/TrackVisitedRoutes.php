<?php
    namespace App\Http\Middleware;

    use Closure;

    class TrackVisitedRoutes
    {
        public function handle($request, Closure $next)
        {
            if ($request->method() === 'GET') {
                $routes = session('visited_routes', []);
                $routes[] = ['url' => $request->fullUrl()];
                session(['visited_routes' => $routes]);
            }

            return $next($request);
        }
    }