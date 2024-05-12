<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guarded = [];

    public function tuiton() {
        return $this->hasOne(Tuiton::class);
    }

    public function person() {
        return $this->belongsTo(Person::class);
    }

    public function courses_students() {
        return $this->hasMany(CourseStudent::class);
    }

}
