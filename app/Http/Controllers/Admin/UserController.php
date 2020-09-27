<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
     * Display a listing of User
     */
    public function showUser()
    {
        $listUser = $this->userService->getAllUser();
        return view('admin.user.list_user', compact('listUser'));
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
        $data['status'] = config('constant.active');
        $data['avatar'] = 'abc';
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
        $data = $request->only('email', 'name', 'password', 'address', 'role', 'status');
        $data['avatar'] = 'abc';
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
     * 
     * @param Request $request
     */
    public function searchUser(Request $request)
    {
        $keyword = $request->keyword;
        $selectUser = $request->selectUser;
        $listUser = $this->userService->searchUser($keyword, $selectUser);
        return view('admin.user.list_user', compact('listUser', 'keyword', 'selectUser'));
    }
}
