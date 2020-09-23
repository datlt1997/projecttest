<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Auth;
use App\User;

class UserController extends Controller
{

    /**
     * This function is login website
     * @param LoginFormRequest $request
     */
    public function loginWeb(LoginFormRequest $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            if (Auth::user()->role == 1) {
            	return redirect()->route('show-user');
            } elseif (Auth::user()->role == 2) {
            	return redirect()->route('show-user');
            } else {
            	return view('user.home');
            }
        } else {
        	return redirect()->back()->with('mess', 'Email hoặc mật khẩu của bạn sai');
        }
    }

    /**
     * Display a listing of User
     */
    public function showUser()
    {
        $list_user = User::all();
        return view('admin.dashboard',compact('list_user'));
    }

    /**
     *  Show form for creating a new User
     */
    public function addUser()
    {
        return view('admin.user.add_user');
    }

    /**
     * Save a new User
     */
    public function saveUser(Request $request)
    {
        $data = $request->only('email', 'name', 'password', 'role');
        if(empty($data['role'])){
            $data['role'] = 3;
        }
        User::create($data);
        return redirect()->route('show-user');
    }

    /**
     * 
     */
    public function editUser($id)
    {

    }

    /**
     * 
     */
    public function updateUser($id)
    {

    }

    /**
     * 
     */
    public function deleteUser($id)
    {
        
    }
}
