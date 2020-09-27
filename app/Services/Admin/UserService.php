<?php

namespace App\Services\Admin;

use App\Models\User;

class UserService
{    
    /**
     * get all user
     * 
     * @return array listalluser
     */
    public function getAllUser()
    {
    	return User::paginate(config('constant.paginate'));
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
        if($selectUser == 'all') {
            return User::key($keyword)->paginate(config('constant.paginate')); 
        } else {
            return User::key($keyword)->select($selectUser)->paginate(config('constant.paginate'));
        }  
    }
}