<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function timeslot(): BelongsTo
    {
        return $this->belongsTo(Timeslot::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'class_groups', 'class_id')->withTimestamps();
    }

    public function building()
    {
        return $this->classroom->building;
    }
}
