<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\CreateTopicRequest;
use App\Http\Requests\Student\UpdateInforRequest;
use App\Lecturer;
use App\SubmitReport;
use App\Topic;
use App\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class StudentController extends Controller
{
    //
    protected $topic;
    protected $lecturer;
    protected $user;

    public function __construct(Topic $topic, Lecturer $lecturer, SubmitReport $submit, User $user)
    {
        $this->topic = $topic;
        $this->lecturer = $lecturer;
        $this->submit = $submit;
        $this->user = $user;
    }
    public function getInfor()
    {
        $infor = Auth::user();
        return view('student.information', ['infor' => $infor]);
    }
    public function editInfor()
    {
        $editinfor = Auth::user();
        return view('student.updateinformation', ['editinfor' => $editinfor]);
    }
    public function updateInfor(UpdateInforRequest $request)
    {
        $validates = Validator::make($request->all(), [
            'username' => 'required|unique:users|min:3|max:50',
            'email' => 'required|email|unique:users',
        ], [
            'username.required' => 'khong duoc de trong',
        ]);

        $updateinfor = $request->all();
        $this->user->updateStudent($updateinfor, Auth::user()->id);
        return redirect()->route('getinforstudent');
    }
    public function getTopic()
    {
        $student_id = Auth::user()->student->id;
        return view('student.createtopic', [
            'lecturers' => $this->lecturer->getAllLecturer(),
            'topics' => $this->topic->getTopic(),
            'check_create_topic' => $this->topic->checkCreateTopic($student_id)
        ]);
    }
    public function postTopic(Request $request)
    {
        $postTopic = $request->all();
        $this->topic->createTopic($postTopic);
        return redirect()->route('gettopic');
    }
    public function statusTopic()
    {
        $topic = $this->topic->getTopic();
        return view('student.statustopic', compact('topic'));
    }
    public function getcancelTopic()
    {
        $canceltopic = $this->topic->getTopic();
        return view('student.cancel_topic', compact('canceltopic'));
    }
    public function cancelTopic($id)
    {
        $this->topic->cancelTopic($id);
        return redirect()->route('getcancel');
    }

    public function extendTopic()
    {
        $extendtopic = $this->topic->getTopic();
        return view('student.extend_topic', compact('extendtopic'));
    }
    public function postExtendTopic()
    {

    }
    public function getFormSubmit()
    {
        return view('student.submitproject');
    }

    public function submitReport(Request $request)
    {
        $submitreport = new SubmitReport();

        $submitreport->description = $request->get('description');
        $submitreport->topic_id = 1; // chưa lấy dc topic_id nên anh fixx cứng = 1 cho dễ làm
        $submitreport->file = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('/upload'), $submitreport->file);
        // file nộp kia sẽ vào mục public/upload nhé

        $submitreport->save();
        return redirect()->route('submitreport');
    }
}
