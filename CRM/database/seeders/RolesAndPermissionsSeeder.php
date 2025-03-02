<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // إنشاء صلاحيات
        Permission::create(['name' => 'create post']);
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'delete post']);
        Permission::create(['name' => 'view post']);

        // إنشاء أدوار
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // ربط الأدوار بالصلاحيات
        $adminRole->givePermissionTo(Permission::all()); // منح جميع الصلاحيات للمسؤول
        $userRole->givePermissionTo(['view post', 'create post']); // منح صلاحيات عرض وإنشاء للمستخدم العادي
    }
}
