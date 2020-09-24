<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\LoginFormRequest;
use App\Http\Requests\Admin\AddUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Auth;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Show form login
     * 
     */
    public function loginFormAdmin()
    {
        return view('login.login_form');
    }

    /**
     * This function is login website
     * @param LoginFormRequest $request
     */
    public function loginUser(LoginFormRequest $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            if (Auth::user()->active == config('constant.active')) {
                if (Auth::user()->role == config('constant.superadmin')) {
                    return redirect()->route('show-user');
                } elseif (Auth::user()->role == config('constant.admin')) {
                    return redirect()->route('show-user');
                } else {
                    return redirect()->route('login-admin')->with('mess', 'Bạn Không có quyền vào trang này');
                } 
            }
            else {
                return redirect()->back()->with('mess', 'Tài khoản của bạn đã vô hiệu hóa');
            }
        }
        else {
        	return redirect()->back()->with('mess', 'Email hoặc mật khẩu của bạn sai');
        }
    }

    /**
     * Display a listing of User
     */
    public function showUser()
    {
        $list_user = User::paginate(5);
        return view('admin.user.list_user', compact('list_user'));
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
     * @param AddUserRequest $request
     */
    public function saveUser(AddUserRequest $request)
    {
        $data = $request->only('email', 'name', 'password', 'address', 'role');
        $data['password'] = Hash::make($data['password']);
        $data['active'] = config('constant.active');
        // dd($data['role'] == config('constant.admin'));
        if(( empty($data['role'] )) || ($data['role'] != config('constant.admin'))) {
            $data['role'] = config('constant.user');
        }
        User::create($data);
        return redirect()->route('show-user');
    }

    /**
     * Edit User
     * @param $id
     */
    public function editUser($id)
    {
        $editUser =User::find($id);
        return view('admin.user.edit_user', compact('editUser'));
    }

    /**
     * Update User
     * @param UpdateUserRequest $request, $id
     * 
     */
    public function updateUser(UpdateUserRequest $request, $id)
    {
        $data = $request->only('email', 'name', 'password', 'address', 'role', 'active');
        User::find($id)->update($data);
        return redirect()->route('show-user');
    }

    /**
     * Delete user
     * @param $id
     * 
     */
    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('show-user');
    }

    /**
     * Search user
     * @param Request $request
     * 
     */
    public function searchUser(Request $request)
    {
        $keyword = $request->keyword;
        $selectUser = $request->selectUser;
        if(isset($keyword)) {
            $list_user = User::where('name', 'like', '%'.$keyword.'%')->orWhere('email', 'like', '%'.$keyword.'%')->orWhere('address', 'like', '%'.$keyword.'%')->paginate(5);
        } elseif ($selectUser != config('constant.selectadd')) {
            $list_user = User::where('active', 'like', $selectUser)->paginate(5);
        } elseif ((isset($keyword))&&($selectUser != config('constant.selectadd'))) {
            $list_user = User::where('name', 'like', '%'.$keyword.'%')->orWhere('email', 'like', '%'.$keyword.'%')->orWhere('address', 'like', '%'.$keyword.'%')->orWhere('active', 'like', $selectUser)->paginate(5);
        }
        else{
            $list_user = User::paginate(5);
        }
        return view('admin.user.list_user',compact('list_user', 'keyword', 'selectUser'));

        // $resultUser = User::where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orWhere('address','like','%'.$keyword.'%')->get();
        // $resultUser = User::where('active', 'like', $selectUser)->get();
        // dd($resultUser);
    }
}
