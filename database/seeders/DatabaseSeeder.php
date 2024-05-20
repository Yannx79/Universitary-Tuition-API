<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Docent;
use App\Models\Person;
use App\Models\Student;
use App\Models\Tuiton;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        Person::factory(20)->create();
        Student::factory(20)->create();
        Tuiton::factory(20)->create();
        Docent::factory(20)->create();
        Course::factory(100)->create();
        CourseStudent::factory(100)->create();

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
