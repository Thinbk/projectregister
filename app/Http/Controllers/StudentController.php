<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\SubmitReport;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    protected $topic;
    protected $lecturer;

    public function __construct(
        Topic $topic,
        Lecturer $lecturer,
        SubmitReport $submit
    )
    {
        $this->topic = $topic;
        $this->lecturer = $lecturer;
        $this->submit = $submit;
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
        $this->topic->createTopic($request);
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
