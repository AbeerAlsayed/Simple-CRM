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
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'view']);

        // إنشاء أدوار
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // ربط الأدوار بالصلاحيات
        $adminRole->syncPermissions(Permission::all());
        $adminRole->givePermissionTo(Permission::all()); // منح جميع الصلاحيات للمسؤول


        $userRole->givePermissionTo(['view', 'create']); // منح صلاحيات عرض وإنشاء للمستخدم العادي
    }
}
