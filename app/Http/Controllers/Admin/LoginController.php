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
        $data = $request->only('name', 'password');
        if (Auth::attempt($data)) {
            if (Auth::user()->status == config('constant.active')) {
                if ( (Auth::user()->role == config('constant.superadmin')) || (Auth::user()->role == config('constant.admin'))) {
                    return redirect()->route('show-user');
                } else {
                    return redirect()->back()->with('mess', 'Bạn Không có quyền vào trang này');
                } 
            } else {
                return redirect()->back()->with('mess', 'Tài khoản của bạn đã vô hiệu hóa');
            }            
        } else {
        	return redirect()->back()->with('mess', 'Email hoặc mật khẩu của bạn sai');
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
			return redirect()->route('form-login-admin');
		}
    }
}
