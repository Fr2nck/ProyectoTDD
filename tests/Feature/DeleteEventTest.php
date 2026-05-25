<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;

class DeleteEventTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function test_an_event_can_be_deleted()
    {
        // Arrange
        $event = Event::create([
            'name' => 'Conferencia de Devs',
            'feature' => 'imagen.jpg',
            'date' => Carbon::now(),
            'time' => '12:00:00',
            'location' => 'Santiago Bernabeu'
        ]);
        // Act
        $response = $this->delete("/events/{$event->id}");

        // Assert
        $response->assertStatus(204);
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}