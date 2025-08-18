<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserActive
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user && $user->is_active == 0) {
            // Only allow access to /profile
            if ($request->is('profile')) {
                return $next($request);
            }

            // Redirect everything else to profile
            return redirect('/profile');
        }
        return $next($request);
    }
}
