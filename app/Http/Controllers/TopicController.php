<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //
    protected $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }
    public function getTopic()
    {
        return view('student.createtopic');
    }
    public function postTopic(Request $request)
    {
        $topic = $request->all();
        $this->topic->createTopic($topic);
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
