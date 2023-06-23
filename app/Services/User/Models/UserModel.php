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

    //create protected $fillable = ['user_name', 'address', 'email', 'contact']
    protected $fillable = [
        'user_name',
        'address',
        'email',
        'contact',
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
}
