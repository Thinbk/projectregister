<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;
    const STUDENT = 1;
    const TEACHER = 2;
    const ADMIN = 3;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getUser()
    {
        $user = $this->user->getUser();
        return view('admin.listuser', compact('user'));
    }
    public function create()
    {
        return view('admin.createuser');
    }
    public function createUser(Request $request)
    {
        $user = $request->all();

        $this->user->createUser($user);
        return redirect()->route('getuser');
    }
    public function updateUser(Request $request, $id)
    {

    }
    public function deleteUser($id)
    {
        $this->user->deleteUser($id);
        return redirect()->route('getuser');
    }

    public function getLogin()
    {
        return view('layout.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // login thành công
            // check xem user này thuộc cái nàog. và chuyển hướng tới cái đó.
            // dd(Auth::user()->id);

            if (Auth::user()->user_type == 3) {
                return redirect()->route('getuser');
            }
            elseif (Auth::user()->user_type == 2) {
                return redirect()->route('listtopic');
            }
            elseif (Auth::user()->user_type == 1) {
                return redirect()->route('gettopic');
            }
        } else {
            return redirect()
                ->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
