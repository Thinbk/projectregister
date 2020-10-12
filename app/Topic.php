<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Topic extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'student_id',
        'topic_status',
        'lecturer_id',
        'date',
        'cancel_topic_status'
    ];

    public function createTopic($request)
    {
        $createtopic = new Topic();

        $createtopic->name = $request['nametopic'];
        $createtopic->lecturer_id = $request['lecturer_id'];
        $createtopic->lecturer_name = $request['teacher'];
        $createtopic->student_id = Auth::user()->id;
        $createtopic->date = $request['date'];
        $createtopic->topic_id = $request['topic_code'];
        $createtopic->topic_status = 0;
        $createtopic->cancel_topic_status = 1;

        $createtopic->save();
    }

    public function getTopic()
    {
        return $topic = Topic::all();
    }

    public function cancelTopic($id)
    {
        return DB::table('topics')->where('id', $id)->update(['cancel_topic_status' => 0 ]);
    }
}
