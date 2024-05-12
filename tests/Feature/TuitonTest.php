<?php

namespace Tests\Feature;

use App\Models\Tuiton;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TuitonTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index()
    {
        $this->get('tuitons')
            ->assertOk();
    }

    public function test_store()
    {
        $this->post('tuitons', [])
            ->assertCreated();
    }

    public function test_show()
    {
        $tuiton = Tuiton::factory()->create();
        $this->get('tuitons' . '/' . $tuiton->id)
            ->assertOk();
    }

    public function test_update()
    {
        $tuiton = Tuiton::factory()->create();
        $this->put('tuitons' . '/' . $tuiton->id, [])
            ->assertOk();
    }

    public function test_destroy()
    {
        $tuiton = Tuiton::factory()->create();
        $this->delete('tuitons' . '/' . $tuiton->id)
            ->assertNoContent();
    }
}
