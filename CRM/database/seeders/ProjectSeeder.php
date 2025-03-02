<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // إنشاء 10 مشاريع مع مهام مرتبطة بكل مشروع
        Project::factory(10)
            ->withTasks(5) // إنشاء 5 مهام لكل مشروع
            ->create();
    }
}
