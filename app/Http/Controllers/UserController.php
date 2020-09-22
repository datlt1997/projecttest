<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginWeb(Request $request){
        $data=$request->only('email','password');
        if(Auth::attempt($data)){
            if(Auth::user()->role==1){
            	return view('admin.dashboard');
            }else if(Auth::user()->role==2){
            	return view('admin.dashboard');
            }else if(Auth::user()->role==3){
            	return view('user.home');
            }

        }
        else{
        	return view('login.loginform');
        }
    }
}
