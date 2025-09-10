<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'manage users',
            'manage settings',
            'manage dynamic pages',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $userRole  = Role::firstOrCreate(['name' => 'User']);

        // Assign permissions
        $adminRole->syncPermissions(Permission::all()); // Admin gets all permissions

        // Assign limited permissions to User
        $limitedPermissions = Permission::whereIn('name', ['manage dynamic pages'])->get();
        $userRole->syncPermissions($limitedPermissions);
    }
}
