<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    return [
        'title' => fake()->sentence,
        'description' => fake()->paragraph,
        'status' => fake()->randomElement(['pending', 'completed']),
        'priority' => fake()->randomElement(['low', 'medium', 'high']),
        'order' => fake()->numberBetween(1, 100),
        'user_id' => \App\Models\User::factory(),
    ];
    }
}
