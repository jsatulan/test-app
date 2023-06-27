<?php

namespace App\Services\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserModel
 * @package App\Services\User\Models
 * @author Jaybee Satulan <jsatulan@fullscale.io>
 * @since 2023.06.23
 */
class UserModel extends Model
{
    use HasFactory;

    //create protected $table = 'user'
    protected $table = 'user';

    //create protected $fillable = ['name', 'address', 'email', 'contact_no']
    protected $fillable = [
        'name',
        'address',
        'email',
        'contact_no',
    ];

    //create protected $hidden = ['created_at', 'updated_at']
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // create function getUsers to get all users and convert to array
    public function getUsers()
    {
        return $this->all()->toArray();
    }

    // create function saveUser to save user
    public function saveUser($userInfo)
    {
        return $this->create($userInfo);
    }

    // create function deleteUser to delete user
    public function deleteUser($id)
    {
        return $this->where('id', $id)->delete();
    }

    // create function updateUser to update user
    public function updateUser($id, $userInfo)
    {
        return $this->where('id', $id)->update($userInfo);
    }
}
