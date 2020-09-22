<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login.loginform');
    }
    public function loginWeb(Request $request){
        $data=$request->only('email','password');
        dd($data);
        if(Auth::attempt($data)){
            if(Auth::user()->role==1){

            }else if(Auth::user()->role==2){

            }else if(Auth::user()->role==3){

            }

        }
        else{

        }
    }
}
