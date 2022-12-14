<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTime extends Model
{
    use HasFactory;
    protected $fillable= [
        'number',
        'start_lesson',
        'end_lesson'
    ];
}
