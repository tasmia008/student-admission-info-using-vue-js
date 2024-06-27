<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'course_id', 'password','email','state'];
    public function course()

    {
        return $this->belongsTo(Course::class);
    }


    
}
