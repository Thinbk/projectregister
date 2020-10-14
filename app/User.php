<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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

    public function lecturer() {
        return $this->hasOne('App\Lecturer');
    }

    public function getUser()
    {
        return User::all();
    }

    public function createUser($request)
    {
        $addUser = new User();

        $addUser->username = $request['user_name'];
        $addUser->password = Hash::make($request['password']);
        $addUser->full_name = $request['full_name'];
        $addUser->email = $request['email'];
        $addUser->user_type = $request['type'];

        $addUser->save();

        // insert table student
        if ($addUser->user_type == 1) {
            $addStudent = new Student();
            $addStudent->user_id = $addUser->id;
            $addStudent->save();
        }

        // insert table lecture
        if ($addUser->user_type == 2) {
            $addLecture = new Lecturer();
            $addLecture->user_id = $addUser->id;
            $addLecture->save();
        }
    }

    public function updateUser($id, $request)
    {
        $updateUser = User::findOrFail($id);

        $updateUser->username = $request['user_name'];
        $updateUser->password = Hash::make($request['password']);
        $updateUser->full_name = $request['full_name'];
        $updateUser->email = $request['email'];
        $updateUser->updated_at = Carbon::now();
        $updateUser->user_type = 1;

        $updateUser->save();
    }

    public function deleteUser($id)
    {
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();
    }
}
