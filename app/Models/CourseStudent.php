<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CourseStudent extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guarded = [];

    public function course() {
        return $this->belongsTo(course::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }

}
