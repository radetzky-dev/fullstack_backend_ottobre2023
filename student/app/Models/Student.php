<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends model
{
    protected $fillable = ['name', 'email', 'phone', 'password'];

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
