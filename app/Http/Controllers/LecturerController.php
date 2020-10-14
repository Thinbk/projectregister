<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    //
    protected $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
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
