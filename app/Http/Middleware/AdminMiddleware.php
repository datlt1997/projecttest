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
        if(Auth::check()) {
            if (Auth::user()->status == config('constant.active')) {
                if (Auth::user()->role < config('constant.user')) {
                    return $next($request);
                } else {
                    return redirect()->back()->with('mess', 'Bạn Không có quyền vào trang này');
                }
            }
            else {
                return redirect()->back()->with('mess', 'Tài khoản của bạn đã vô hiệu hóa');
            }
        }
        
    }
}
