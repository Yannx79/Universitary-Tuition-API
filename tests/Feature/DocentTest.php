<?php

namespace Tests\Feature;

use App\Models\Docent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DocentTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_index()
    {
        $this->get('docents')
            ->assertOk();
    }

    public function test_show()
    {
        $docent = Docent::factory()->create();
        $this->get('docents' . '/' . $docent->id)
            ->assertOk();
    }

    public function test_store()
    {
        $this->post('docents',  [])
            ->assertCreated();
    }

    public function test_update()
    {
        $docent = Docent::factory()->create();
        $this->put('docents' . '/' . $docent->id, [])
            ->assertOk();
    }

    public function test_destroy()
    {
        $docent = Docent::factory()->create();
        $this->delete('docents' . '/' . $docent->id)
            ->assertNoContent();
    }
}
