<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubmitReport extends Model
{
    //
    protected $fillable = [
        'topic_id',
        'file',
        'status',
        'description'
    ];

    public function topic() {
        return $this->belongsTo('App\Topic', 'topic_id');
    }

    public function submitReport($request)
    {
        $submitReport = new SubmitReport();
        $submitReport->student_name = $request['student_name'];
        $submitReport->student_id = Auth::user()->id;
        $submitReport->file = $request['file'];
        $submitReport->status = 0;

        $submitReport->save();
    }
}
