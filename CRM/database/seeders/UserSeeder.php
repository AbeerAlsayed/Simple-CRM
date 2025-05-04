<?php

// database/seeders/UserSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Get roles
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole($adminRole);

        // Create regular users
        $users = [
            ['John Doe', 'john@example.com'],
            ['Jane Smith', 'jane@example.com'],
            ['Mike Johnson', 'mike@example.com'],
            ['Sarah Williams', 'sarah@example.com'],
        ];

        foreach ($users as $user) {
            $newUser = User::create([
                'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            $newUser->assignRole($userRole);
        }

        // Create additional random users
        User::factory(5)->create()->each(function ($user) use ($userRole) {
            $user->assignRole($userRole);
        });
    }
}
