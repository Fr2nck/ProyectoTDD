<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;


class ReadEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_display_list_of_events(): void
    {
        // Arrange
        Event::create([
            'name' => 'Evento 1',
            'feature' => 'imagen.jpg',
            'date' => Carbon::now(),
            'time' => '12:00:00',
            'location' => 'Santiago Bernabeu'
        ]);

        Event::create([
            'name' => 'Evento 2',
            'feature' => 'imagen2.jpg',
            'date' => Carbon::now()->addDay(),
            'time' => '14:00:00',
            'location' => 'Wembley Stadium'
        ]);

        // Act
        $response = $this->get('/events');

        // Assert
        $response->assertStatus(200);

        $response->assertSee('Evento 1');
        $response->assertSee('Evento 2');

    }
}