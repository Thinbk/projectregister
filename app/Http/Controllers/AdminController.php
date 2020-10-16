<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    //
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getInfor()
    {
        $infor = User::where('id', Auth::user()->id)->get();
        return view('admin.information', ['infor' => $infor]);
    }

    public function editInfor()
    {
        $editinfor =  User::where('id', Auth::user()->id)->get();
        return view('admin.updateinformation', ['editinfor' => $editinfor]);
    }
    public function updateInfor(Request $request)
    {
        $validates = Validator::make($request->all(), [
            'username' => 'required|unique:users|min:3|max:50',
            'email' => 'required|email|unique:users',
        ], [
            'username.required' => 'khong duoc de trong',
        ]);

        $updateinfor = $request->all();
        $this->user->updateInfor($updateinfor, Auth::user()->id);
        return redirect()->route('getinforadmin');
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
    public function getUpdateUser($id)
    {
        $id = User::findOrFail($id);
        return view('admin.updateuser', ['id' => $id], compact('id'));
    }
    public function updateUser(Request $request, $id)
    {
        $updateUser = $request->all();
        $this->user->updateUser($id, $updateUser);
        return redirect()->route('getuser');
    }
    public function deleteUser($id)
    {
        $this->user->deleteUser($id);
        return redirect()->route('getuser');
    }
}
