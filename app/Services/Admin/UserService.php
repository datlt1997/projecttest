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
    	return User::paginate(5);
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
     * search user by keyword
     * 
     * @param string $keyword
     * @return array listsearchuser
     */
    public function searchByKey($keyword){
    	return User::where('name', 'like', '%'.$keyword.'%')
                ->orWhere('email', 'like', '%'.$keyword.'%')
                ->orWhere('address', 'like', '%'.$keyword.'%')
                ->paginate(5);
    }

    /**
     * search user by active status
     * 
     * @param string $selectUser
     * @return array listsearchuser
     */
    
    public function searchByActive($selectUser){
    	return User::where('active', 'like', $selectUser)->paginate(5);
    }

    /**
     * search user by keyword and active status
     * 
     * @param string $keyword 
     * @param string $selectUser
     * @return array listsearchuser
     */
    public function searchByAll($keyword, $selectUser){
    	return User::where('active', '=', $selectUser)
                ->where('name', 'like', '%' . $keyword .'%')
                ->orWhere('email', 'like', '%' . $keyword . '%')
                ->orWhere('address', 'like', '%' . $keyword . '%')
                ->paginate(5);
    }

}