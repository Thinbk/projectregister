<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Lecturer extends Eloquent
{
    //
    protected $fillable = [
        'user_id'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function topic() {
        return $this->hasMany('App\Topic', 'lecturer_id');
    }

    public function getAllLecturer() {
        return Lecturer::all();
    }
}
