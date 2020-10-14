<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
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
