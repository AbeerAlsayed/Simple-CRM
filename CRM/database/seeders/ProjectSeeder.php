<?php

// database/seeders/ProjectSeeder.php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $admin = User::where('email', 'admin@admin.com')->first();
        $client = Client::where('name', 'Walter-Mertz')->first();

        // Create sample projects
        $projects = [
            [
                'title' => 'Website Redesign',
                'description' => 'Complete redesign of company website with modern UI/UX',
                'deadline' => now()->addMonths(3),
                'status' => 'in_progress',
                'assigned_user_id' => $admin->id,
                'assigned_client_id' => $client->id,
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Build cross-platform mobile application for iOS and Android',
                'deadline' => now()->addMonths(6),
                'status' => 'pending',
                'assigned_user_id' => User::where('email', 'john@example.com')->first()->id,
                'assigned_client_id' => Client::where('name', 'Daugherty Inc')->first()->id,
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // Create additional random projects
        Project::factory(15)->create();
    }
}
