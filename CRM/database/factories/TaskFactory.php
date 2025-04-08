<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'due_date' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
            'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),
            'parent_task_id' => null, // لاحقًا نقدر نعمل مهام فرعية
        ];
    }

}
