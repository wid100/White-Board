<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role->id == 2) {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role->id == 5) {
            Auth::logout();
            return redirect()->route('login')
                ->withErrors(['email' => 'Your account has been Banned. Please contact administrator.']);
        } else {
            return redirect()->route('login');
        }
    }
}
