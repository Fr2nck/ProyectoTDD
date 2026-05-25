<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class CreateEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_event_can_be_created()
    {
        // 1. Arrange
        $eventData = [
            'name' => 'Conferencia de Devs',
            'feature' => 'imagen.jpg',
            'date' => Carbon::now()->format('Y-m-d'), // O la fecha estática que hayas puesto
            'time' => '10:00:00',
            'location' => 'Santiago Bernabeu'
        ];

        // 2. Act
        $response = $this->post('/events', $eventData);

        // 3. Assert
        $response->assertStatus(302);
        $this->assertDatabaseHas('events', $eventData);
    }
}