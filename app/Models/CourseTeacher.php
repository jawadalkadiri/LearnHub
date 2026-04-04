<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTeacher extends Model
{
    protected $table = 'course_teacher';
    protected $fillable = [
        'user_id',
        'course_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

}
