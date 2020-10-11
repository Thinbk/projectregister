<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'full_name',
        'date_of_birth',
        'phone_number',
        'user_type'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }

    public function getUser()
    {
        return $user = User::all();
    }

    public function createUser($request)
    {
        $addUser = new User();

        $addUser->username = $request['user_name'];
        $addUser->password = Hash::make($request['password']);
        $addUser->full_name = $request['full_name'];
        $addUser->email = $request['email'];
        $addUser->user_type = 3;

        $addUser->save();
    }

    public function updateUser($id, $request)
    {
        $updateUser = User::findOrFail($id);

        $updateUser->username = $request['user_name'];
        $updateUser->password = Hash::make($request['password']);
        $updateUser->full_name = $request['full_name'];
        $updateUser->email = $request['email'];
        $updateUser->user_type = 1;

        $updateUser->save();
    }

    public function deleteUser($id)
    {
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();
    }
}
