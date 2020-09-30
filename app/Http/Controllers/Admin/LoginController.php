<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginFormRequest;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function loginFormAdmin()
    {
        return view('login.login_form');
    }

    /**
     * This function is login Admin
     * @param LoginFormRequest $request
     */
    public function loginAdmin(LoginFormRequest $request)
    {

        $data = $request->only('username', 'password');

        if (Auth::attempt($data)) {
            if (Auth::user()->status == config('constant.active')) {
                if ( (Auth::user()->role == config('constant.superadmin')) || (Auth::user()->role == config('constant.admin'))) {
                    return redirect()->route('show-user');
                } else {
                    return redirect()->route('show-post');
                } 
            } else {
                return redirect()->route('admin-logout')->with('mess', 'Tài khoản của bạn đã bị khóa');
            }            
        } else {
        	return redirect()->back()->with('mess', 'User hoặc mật khẩu của bạn sai');
        }
    }

    /**
     * This function is logout Admin
     * 
     */
    public function logoutAdmin(){
    	if(Auth::check())
		{
			Auth::logout();
            if(session('mess')) {
                return redirect()->route('form-login-admin')->with('mess', 'Tài khoản của bạn đã bị khóa');
            }
			return redirect()->route('form-login-admin');
		}
    }
}
