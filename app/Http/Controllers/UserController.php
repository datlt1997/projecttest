<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;

class UserController extends Controller
{
    public function loginWeb( LoginFormRequest $request){
        $data = $request -> only ('email', 'password');
        if (Auth::attempt($data)){
            if (Auth::user() -> role == 1) {
            	return view('admin.dashboard');
            } elseif (Auth::user() -> role == 2) {
            	return view('admin.dashboard');
            } elseif (Auth::user() -> role == 3) {
            	return view('user.home');
            }
        } else {
        	return redirect()->back()->with('mess','Email hoặc mật khẩu của bạn sai');
        }
    }
}
