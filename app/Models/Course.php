<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title','description','img_path'];

    public function lessons(){
        return $this->hasMany(Lesson::class,'course_id');
    }

    public function enrolledBy(){
        return $this->belongsToMany(User::class,'enrollments');
    }

    public function teachedBy(){
        return $this->belongsToMany(User::class,'course_teacher');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
