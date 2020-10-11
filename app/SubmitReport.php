<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmitReport extends Model
{
    //
    protected $fillable = [
        'topic_id',
        'file',
        'status'
    ];

    public function submitProject($request)
    {
        $submitReport = new SubmitReport();
        $submitReport->name = $request['name'];
        $submitReport->topic_id = $request['topic_id'];
        $submitReport->file = $request['file'];
        $submitReport->status = 0;

        $submitReport->save();
    }
}
