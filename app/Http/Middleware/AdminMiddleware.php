<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->status == config('constant.active')) {
                if ( (Auth::user()->role == config('constant.superadmin')) && (Auth::user()->role == config('constant.admin')) ) {
                    return $next($request);
                } else {
                    return redirect()->route('form-login-admin');
                } 
            } else {
                return redirect()->route('form-login-admin');
            }
        } else {
            return redirect()->route('form-login-admin');
        }
    }
}
