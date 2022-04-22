<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
}
