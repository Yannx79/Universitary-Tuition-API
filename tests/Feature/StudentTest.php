<?php

namespace Tests\Feature;

use App\Models\Student;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index()
    {
        $this->get('students')
            ->assertOk();
    }

    public function test_store()
    {
        $this->post('students', [])
            ->assertCreated();
    }

    public function test_show()
    {
        $student = Student::factory()->create();
        $this->get('students' . '/' . $student->id)
            ->assertOk();
    }

    public function test_update()
    {
        $student = Student::factory()->create();
        $this->put('students' . '/' . $student->id, [])
            ->assertOk();
    }

    public function test_destroy()
    {
        $student = Student::factory()->create();
        $this->delete('students' . '/' . $student->id)
            ->assertNoContent();
    }
}
