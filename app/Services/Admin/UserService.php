<?php

namespace App\Services\Admin;

use App\Models\User;
use Auth;
use File;

class UserService
{    
    /**
     * get all user
     * 
     * @return array listalluser
     */
    public function getAllUser()
    {
    	return User::where('role','>', Auth::user()->role)->paginate(config('constant.paginate'));
    }

    /**
     * create user
     * 
     * @param array $data
     * @return array newuser
     */
    public function createUser($data)
    {
    	return User::create($data);
    }

    /**
     * edit user
     * 
     * @param int $id
     * @return array user-edit
     */
    public function editUser($id)
    {
    	return User::find($id);
    }

    /**
     * update user
     * 
     * @param int $id 
     * @param array $data
     * @return array user-update
     */
    public function updateUser($id, $data)
    {
    	User::find($id)->update($data);
    }

    /**
     * delete user
     * 
     * @param int $id
     * @return array 
     * 
     */
    public function deleteUser($id)
    {
    	return User::destroy($id);
    }

    /**
     * search user by keyword and status
     * 
     * @param string $keyword 
     * @param string $selectUser
     * @return array listsearchuser
     */
    public function searchUser($keyword, $selectUser){   
        $user = User::key($keyword);
        if(!is_null($selectUser)) {
            $user = $user->selectbox($selectUser);
        }
        $user = $user->where('role','>', Auth::user()->role)->paginate(config('constant.paginate'));
        return $user;
    }

    /**
     * DeleteImage
     * @param  int $id
     * @return
     */
    public function getDeleteImage($id)
    {
        return File::delete('images/Admin/avatar/'. User::find($id)->avatar);
    }

    /**
     * Change Status
     * @param  int $id
     * @return
     */
    public function getChangeStatus($id)
    {
        if(User::find($id)->status == config('constant.active')) {
            $data['status'] = config('constant.inactive');
        } else {
            $data['status'] = config('constant.active');
        }
        User::find($id)->update($data);
    }

    /**
     * check status
     * @param  int $id
     * @return
     */
    public function checkStatus($id)
    {
        if(User::find($id)->status == config('constant.active')) {
            return $data['status'] = config('constant.inactive');
        } else {
            return $data['status'] = config('constant.active');
        }
    }
}