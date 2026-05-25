<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Event;

class UpdateEventTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        $this->event = Event::create([
            'name' => 'Evento a ser actualizado',
            'feature' => 'imagen.jpg',
            'date' => Carbon::now(),
            'time' => '12:00:00',
            'location' => 'Ubicacion a actualizar'
        ]);
    }

    public function test_an_event_can_be_updated()
    {
        // Arrange
        $updatedData = [
            'name' => 'Evento actualizado',
        ];

        // Act
        $response = $this->put("/events/{$this->event->id}", $updatedData);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('events',$updatedData);

    }

}