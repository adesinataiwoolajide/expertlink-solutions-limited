<?php 
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class TrackVisitedRoutes
{
    public function handle($request, Closure $next)
    {
        if ($request->method() === 'GET' && Auth::check()) {
            $visited = session()->get('visited_routes', []);
            $visited[] = [
                'url' => $request->fullUrl(),
                'route' => $request->route()->getName(),
                'time' => now()->toDateTimeString(),
                'user' => Auth::user()->id
            ];

            $visited = array_slice($visited, -5); // Keep only the last 5
            session(['visited_routes' => $visited]);
        }

        return $next($request);
    }

} 

?>