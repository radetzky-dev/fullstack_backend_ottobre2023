<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'password'];

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
