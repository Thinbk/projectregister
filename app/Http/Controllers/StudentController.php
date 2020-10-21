<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\CreateTopicRequest;
use App\Http\Requests\Student\SubmitReportRequest;
use App\Http\Requests\Student\UpdateInforRequest;
use App\Lecturer;
use App\SubmitReport;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
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
        $updateinfor = $request->all();
        $this->user->updateStudent($updateinfor, Auth::user()->id);
        return redirect()->route('getinforstudent')->with('key', 'Cập nhật thông tin thành công');
    }
    public function getTopic()
    {
        $student_id = Auth::user()->student->id;
        return view('student.createtopic', [
            'lecturers' => $this->lecturer->getAllLecturer(),
            'topic' => $this->topic->getTopic(),
            'check_create_topic' => $this->topic->checkCreateTopic($student_id),
//            'check_cancel_topic' => $this->topic->checkCancelTopic($student_id)
        ]);
    }
    public function postTopic(CreateTopicRequest $request)
    {
        $postTopic = $request->all();
        $this->topic->createTopic($postTopic);
        return redirect()->route('gettopic')->with('key', 'Đăng ký đề tài thành công');
    }
    public function statusTopic()
    {
        $student_id = Auth::user()->student->id;
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
    public function getExtendTopic()
    {
        $extendtopic = $this->topic->getTopic();
        return view('student.formextendtopic',compact('extendtopic'));
    }
    public function postExtendTopic(Request $request)
    {
        $postextend = $request->all();
        $this->topic->postExtendTopic($this->topic->getTopic()[0]->id, $postextend);
        return redirect()->route('extendTopic');
    }
    public function getFormSubmit()
    {
        return view('student.submitproject', ['topics' => $this->topic->getIdtopic()]);
    }

    public function submitReport(SubmitReportRequest $request)
    {
        $submitreport = new SubmitReport();

        $submitreport->description = $request->get('description');
        $submitreport->topic_id = $request->get('topic_id');
        $submitreport->file = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('/upload'), $submitreport->file);
        // file nộp kia sẽ vào mục public/upload nhé

        $submitreport->save();
        return redirect()->route('submitreport')->with('key', 'Nộp file thành công');
    }
}
