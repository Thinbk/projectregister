<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Admin extends Eloquent
{
    //
    protected $table = "admin";
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
