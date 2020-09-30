<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;

class HomeController extends Controller
{
    public function index()
    {
    	return view('user.register');
    }

    public function registerForm(Request $request){
    	Candidate::create($request->all());
    }
}
