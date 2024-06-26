<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Docent extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guarded = [];

    public function person() {
        return $this->belongsTo(Person::class);
    }

    public function courses() {
        return $this->hasMany(Course::class);
    }

}
