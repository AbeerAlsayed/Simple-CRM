<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->catchPhrase(),
            'description' => fake()->paragraph(),
            'deadline' => fake()->dateTimeBetween('+1 week', '+2 months'),
            'user_id' => User::factory(),
            'client_id' => Client::factory(),
            'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),
        ];
    }

}
