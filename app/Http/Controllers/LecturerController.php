<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lecture\UpdateInforRequest;
use App\Topic;
use App\User;
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

    public function updateInfor(UpdateInforRequest $request)
    {
        $updateinfor = $request->all();
        $this->user->updateInfor($updateinfor, Auth::user()->id);
        return redirect()->route('getinforlecture');
    }
    //list topic
    public function getTopicStudent()
    {
        return view('teacher.listtopic', ['topics' => $this->topic->getTopicStudent()]);
    }
// gv  duyet dnag ky de tai

    public function getConfirmRegisterTopic()
    {
        return view('teacher.confirmregister', ['topics' => $this->topic->getTopicStudent()]);
    }
    public function confirmRegisterTopic($id)
    {
        $this->topic->confirmRegisterTopic($id);
        return redirect()->route('confirmextend');
    }
// gv duyet gia han de tai

    public function getConfirmExtendTopic()
    {
        return view('teacher.confirmextend', ['topics' => $this->topic->getTopicStudent()]);
    }
    public function confirmExtendTopic($id)
    {
        $this->topic->cofnirmExtendTopic($id);
        return redirect()->route('confirmextend');
    }

    // gv duyet huy de tai

    public function getConfirmCancelTopic()
    {
        return view('teacher.confirmcancel', ['topics' => $this->topic->getTopicStudent()]);
    }
    public function confirmCancelTopic($id)
    {
        $this->topic->cofnirmCancelTopic($id);
        return redirect()->route('confirmcancel');
    }
}
