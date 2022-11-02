<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'lessonTime_id',
        'classRoom_id',
        'dayOfWeeks_id',
        'subject_id',
        'teacher_id',
        'group_id',
    ];


    public function classroom()
    {
        return $this->hasOne(ClassRoom::class, 'id', 'classRoom_id')->first()->number;
    }
    public function lessontime()
    {
        return $this->hasOne(LessonTime::class, 'id', 'lessonTime_Id')->first()->number;
    }
    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id')->first()->name;
    }
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id')->first()->second_name;
    }
    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id')->first()->name;
    }

}
