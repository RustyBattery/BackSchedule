<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classes(): HasMany {
        return $this->hasMany(ClassModel::class);
    }
}
