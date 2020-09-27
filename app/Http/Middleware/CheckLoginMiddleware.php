<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLoginMiddleware
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
        if (isset(Auth::user()->role)) {
            return redirect()->route('show-user');
        } else {
            return $next($request);
        } 
    } 
}

