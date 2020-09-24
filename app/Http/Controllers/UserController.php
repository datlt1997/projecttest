<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\LoginFormRequest;
use App\Http\Requests\Admin\AddUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Services\Admin\UserService;
use Auth;

class UserController extends Controller
{
    private $userServices;

    /**
     * Constructor
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Show form login 
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
        $list_user = $this->userService->getAllUser();
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
        if(( empty($data['role'] )) || ($data['role'] != config('constant.admin'))) {
            $data['role'] = config('constant.user');
        }
        $this->userService->createUser($data);      
        return redirect()->route('show-user');
    }

    /**
     * Edit User
     * @param int $id
     */
    public function editUser($id)
    {
        $editUser = $this->userService->editUser($id);
        return view('admin.user.edit_user', compact('editUser'));
    }

    /**
     * Update User
     * @param UpdateUserRequest $request
     * @param int $id
     */
    public function updateUser(UpdateUserRequest $request, $id)
    {
        $data = $request->only('email', 'name', 'password', 'address', 'role', 'active');
        $this->userService->updateUser($id, $data);
        return redirect()->route('show-user');
    }

    /**
     * Delete user
     * @param int $id
     */
    public function deleteUser($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('show-user');
    }

    /**
     * Search user
     * @param Request $request
     */
    public function searchUser(Request $request)
    {
        $keyword = $request->keyword;
        $selectUser = $request->selectUser;
        // dd($selectUser != config('constant.selectall'));
        if ((isset($keyword)) && ($selectUser != config('constant.selectall'))) {
            $list_user = $this->userService->searchByAll($keyword, $selectUser);
        } elseif (isset($keyword)) {
            $list_user = $this->userService->searchByKey($keyword);

        } elseif ($selectUser != config('constant.selectall')) {
            $list_user = $this->userService->searchByActive($selectUser);

        } else {
            $list_user = $this->userService->getAllUser();
        }
        return view('admin.user.list_user', compact('list_user', 'keyword', 'selectUser'));
    }
}
