<?php
namespace App\Services\User;

use App\Services\User\Models\UserModel;

/**
 * class UserService
 * @package App\Services\User
 * @author Jaybee Satulan <jsatulan@fullscale.io>
 * @since 2023.06.23
 */
//create class UserService
class UserService
{
    //create private UserModel $UserModel
    private UserModel $UserModel;

    //create function __construct with UserModel $oUserModel
    public function __construct(UserModel $UserModel)
    {
        //set $UserModel to $this->UserModel
        $this->UserModel = $UserModel;
    }

    //create function getUser
    public function getUser()
    {
        $users = $this->UserModel->getUsers();

        //check if $users is empty
        if (empty($users)) {
            //return string "No users found"
            return [
                'message' => 'No users found',
                'code'    => 404,
                'data'    => []
            ];
        }

        return [
            'code' => 200,
            'data' => $users
        ];
    }

    //create function saveUser that will accept $userInfo and call saveUser from UserModel
    public function saveUser($userInfo)
    {
        $user = $this->UserModel->saveUser($userInfo);

        //check if $user not exists
        if (!$user->exists) {
            //return string "Failed to save user"
            return [
                'message' => 'Failed to save user',
                'code'    => 500,
                'data'    => []
            ];
        }

        return [
            'code' => 200,
            'data' => $user
        ];
    }

    // create a function deleteUser that will accept $id and call deleteUser from UserModel
    public function deleteUser($id)
    {
        $user = $this->UserModel->deleteUser($id);

        //check if $user is less than 0.
        if ($user < 0) {
            //return string "Failed to delete user"
            return [
                'message' => 'Failed to delete user',
                'code'    => 500,
                'data'    => []
            ];
        }

        return [
            'code' => 200,
            'data' => $user
        ];
    }

    // create a function updateUser that will accept $id and $userInfo and call updateUser from UserModel
    public function updateUser($id, $userInfo)
    {
        $user = $this->UserModel->updateUser($id, $userInfo);

        //check if $user is false
        if (!$user) {
            //return string "Failed to update user"
            return [
                'message' => 'Failed to update user',
                'code'    => 500,
                'data'    => []
            ];
        }

        return [
            'code' => 200,
            'data' => $user
        ];
    }
}
