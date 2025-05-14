<?php
// tests/Feature/TaskTest.php

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_creation(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');

        $response = $this->postJson('/api/tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test.',
            'status' => 'pending',
            'priority' => 'medium',
            'order' => 1,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['title' => 'Test Task']);
    }
}

