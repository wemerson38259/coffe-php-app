<?php

namespace Tests\Feature\Livewire;

use App\Livewire\HomePage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(HomePage::class)
            ->assertStatus(200);
    }
}
