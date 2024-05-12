<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index()
    {
        $this->get('courses')
            ->assertOk();
    }

    public function test_store()
    {
        $this->post('courses', [])
            ->assertCreated();
    }

    public function test_show()
    {
        $course = Course::factory()->create();
        $this->get('courses' . '/' . $course->id)
            ->assertOk();
    }

    public function test_update()
    {
        $course = Course::factory()->create();
        $this->put('courses' . '/' . $course->id, [])
            ->assertOk();
    }

    public function test_destroy()
    {
        $course = Course::factory()->create();
        $this->delete('courses' . '/' . $course->id)
            ->assertNoContent();
    }
}
