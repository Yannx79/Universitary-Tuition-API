<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Person extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guarded = [];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function docents() {
        return $this->hasMany(Docent::class);
    }

}
