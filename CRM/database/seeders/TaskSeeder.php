<?php

// database/seeders/TaskSeeder.php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $admin = User::where('email', 'admin@admin.com')->first();
        $websiteProject = Project::where('title', 'Website Redesign')->first();

        // Create sample tasks
        $tasks = [
            [
                'title' => 'Create project wireframes',
                'description' => 'Design wireframes for all main pages',
                'due_date' => now()->addDays(7),
                'status' => 'pending',
                'user_id' => $admin->id,
                'project_id' => $websiteProject->id,
            ],
            [
                'title' => 'Set up development environment',
                'description' => 'Install all required tools and dependencies',
                'due_date' => now()->addDays(3),
                'status' => 'completed',
                'user_id' => $admin->id,
                'project_id' => $websiteProject->id,
            ]
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }

        // Create additional random tasks
        $tasks = Task::factory(50)->create();

        // Create some subtasks
        foreach ($tasks->random(10) as $parentTask) {
            Task::factory(rand(1, 3))->create([
                'parent_task_id' => $parentTask->id,
                'project_id' => $parentTask->project_id,
                'user_id' => $parentTask->user_id,
            ]);
        }
    }
}
