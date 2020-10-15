<?php

namespace App\Http\Controllers;

use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LecturerController extends Controller
{
    //
    protected $topic;
    protected $user;

    public function __construct(Topic $topic, User $user)
    {
        $this->topic = $topic;
        $this->user = $user;
    }
    public function getInfor()
    {
        $infor = User::where('id', Auth::user()->id)->get();
        return view('teacher.information', ['infor' => $infor]);
    }
    public function editInfor()
    {
        $editinfor =  User::where('id', Auth::user()->id)->get();
        return view('teacher.updateinformation', ['editinfor' => $editinfor]);
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
        return redirect()->route('getinforlecture');
    }
    //list topic
    public function getTopicStudent()
    {
        return view('teacher.listtopic', ['topics' => $this->topic->getTopic()]);
    }
// gv  duyet dnag ky de tai

    public function getConfirmRegisterTopic()
    {
        return view('teacher.confirmregister', ['topics' => $this->topic->getTopic()]);
    }
    public function confirmRegisterTopic(Request $request)
    {

    }
// gv duyet gia han de tai

    public function getConfirmExtendTopic()
    {
        return view('teacher.confirmextend', ['topics' => $this->topic->getTopic()]);
    }
    public function confirmExtendTopic()
    {

    }

    // gv duyet huy de tai

    public function getConfirmCancelTopic()
    {
        return view('teacher.confirmcancel', ['topics' => $this->topic->getTopic()]);
    }
    public function confirmCancelTopic()
    {

    }
}
