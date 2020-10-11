<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Topic extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'student_id',
        'topic_status',
        'lecturer_id',
        'cancel_topic_status'
    ];

    public function createTopic($request)
    {
        $createtopic = new Topic();

        $createtopic->name = $request['nametopic'];
        $createtopic->lecturer_id = $request['lecturer_id'];
        $createtopic->lecturer_name = $request['teacher'];
        $createtopic->student_id = 7;
        $createtopic->topic_status = null;
        $createtopic->cancel_topic_status = 1;

        $createtopic->save();
    }
    public function getTopic()
    {
        return $topic = Topic::all();
    }

    public function cancelTopic($id)
    {
        return DB::table('topics')
            ->where('id', $id)
            ->update(['cancel_topic_status' => 0 ]);
    }
}
