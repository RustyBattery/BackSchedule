<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'subject_id',
        'teacher_id',
        'classroom_id',
        'timeslot_id',
        'date_start',
        'date_end',
        'period'
    ];
}
