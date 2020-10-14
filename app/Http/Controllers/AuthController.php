<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getSignup()
    {
        return view('layout.signup');
    }
    public function signup(Request $request)
    {
        $user = $request->all();
        $this->user->createUser($user);
//        dd($user);

        return redirect('/login');
    }
    public function getLogin()
    {
        return view('layout.login');
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // login thành công
            // check xem user này thuộc cái nào. và chuyển hướng tới cái đó.

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
