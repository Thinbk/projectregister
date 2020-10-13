<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Lecturer;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //
    protected $topic;
    protected $lecturer;

    public function __construct(Topic $topic, Lecturer $lecturer)
    {
        $this->topic = $topic;
        $this->lecturer = $lecturer;
    }
    public function getTopic()
    {
        return view('student.createtopic', [
            'lecturers' => $this->lecturer->getAllLecturer(),
            'topics' => $this->topic->getTopic()
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
}
