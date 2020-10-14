<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    protected $user;

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
}
