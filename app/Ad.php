<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    const COUNT_PAGINATE = 5;

    public $timestamps = false;

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getAuthorNameAttribute()
    {
        return $this->user->name;
    }
}
