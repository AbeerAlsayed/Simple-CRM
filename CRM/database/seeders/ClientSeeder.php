<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { // إنشاء 10 عملاء مع مشاريع مرتبطة
        Client::factory(10)
            ->withProjects(3) // لتوليد 3 مشاريع لكل عميل
            ->create();
    }
}
