<?php

namespace Tests\Feature;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index()
    {
        $this->get('persons')
            ->assertOk();
    }

    public function test_store()
    {
        $this->post('persons', [])
            ->assertCreated();
    }

    public function test_show()
    {
        $person = Person::factory()->create();
        $this->get('persons' . '/' . $person->id)
            ->assertOk();
    }

    public function test_update()
    {
        $person = Person::factory()->create();
        $this->put('persons' . '/' . $person->id, [])
            ->assertOk();
    }

    public function test_destroy()
    {
        $person = Person::factory()->create();
        $this->delete('persons' . '/' . $person->id)
            ->assertNoContent();
    }
}
