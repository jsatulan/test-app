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
    //create private UserModel $oUserModel
    private UserModel $oUserModel;

    //create function __construct with UserModel $oUserModel
    public function __construct(UserModel $oUserModel)
    {
        //set $oUserModel to $this->oUserModel
        $this->oUserModel = $oUserModel;
    }

    //create function getUser
    public function getUser()
    {
        $users = $this->oUserModel->getUsers();

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
}
