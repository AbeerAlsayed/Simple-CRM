<?php

// database/seeders/RolePermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Client permissions
            'view clients', 'create clients', 'edit clients', 'delete clients',
            // Project permissions
            'view projects', 'create projects', 'edit projects', 'delete projects',
            // Task permissions
            'view tasks', 'create tasks', 'edit tasks', 'delete tasks',
            // User permissions
            'view users', 'create users', 'edit users', 'delete users',
            // System permissions
            'manage settings', 'manage roles',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign all permissions to admin
        $adminRole->givePermissionTo(Permission::all());

        // Assign basic permissions to user
        $userRole->givePermissionTo([
            'view clients', 'view projects', 'view tasks',
            'create tasks', 'edit tasks', 'view users',
        ]);
    }
}
