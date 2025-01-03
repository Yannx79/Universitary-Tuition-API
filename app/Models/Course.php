<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Course extends Model
{
    use HasFactory, HasApiTokens, Notifiable, Filterable;

    protected $guarded = [];

    # protected $hidden = ['name'];

    public function docent() {
        return $this->belongsTo(Docent::class);
    }

    public function courses_students() {
        return $this->hasMany(CourseStudent::class);
    }

}
