<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'comment',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
}
