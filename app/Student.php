<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'user_id',
        'student_code',
        'school_year',
        'class',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
