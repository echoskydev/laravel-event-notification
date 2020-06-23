<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    public function user()
    {
        return $this->belongsToMany('App\User', 'user_id');
    }
}
