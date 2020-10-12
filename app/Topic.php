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
    ];

    public function lecturer() {
        return $this->belongsTo('App\Lecturer', 'lecturer_id');
    }

    public function student() {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function submit_report() {
        return $this->hasOne('App\SubmitReport', 'topic_id');
    }

    public function createTopic($request)
    {
        $createtopic = new Topic();

        $createtopic->name = $request->topic_name;
        $createtopic->topic_code = $request->topic_code;
        $createtopic->lecturer_id = $request->lecturers;
        $createtopic->student_id = $request->student_id;
        $createtopic->date = $request->date;
        $createtopic->topic_status = 0;
        $createtopic->cancel_topic_status = 0;

        $createtopic->save();
    }

    public function getTopic()
    {
        return $topic = Topic::all();
    }

    public function cancelTopic($id)
    {
        //trạng thái hủy có 3 TH: 0 - chưa hủy, 1 - đã hủy và chờ duyệt, 2 - đã duyệt hủy
        return DB::table('topics')->where('id', $id)->update(['cancel_topic_status' => 1]); // chỗ này sửa lại là 1 nhé
    }
}
