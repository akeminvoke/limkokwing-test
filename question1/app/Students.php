<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $fillable = [
        'student_name', 'phone', 'date_of_birth','image','nationality'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
