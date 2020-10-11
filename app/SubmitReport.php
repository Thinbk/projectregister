<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubmitReport extends Model
{
    //
    protected $fillable = [
        'topic_code',
        'file',
        'status',
        'student_id',
        'student_name',
        'description'
    ];

    public function submitReport($request)
    {
        $submitReport = new SubmitReport();
        $submitReport->student_name = $request['student_name'];
        $submitReport->topic_code = $request['topic_code'];
        $submitReport->student_id = Auth::user()->id;
        $submitReport->file = $request['file'];
        $submitReport->status = 0;

        $submitReport->save();
    }
}
