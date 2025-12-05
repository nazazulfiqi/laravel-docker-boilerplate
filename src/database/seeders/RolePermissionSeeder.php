<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // LIST PERMISSIONS
        $permissions = [
            'asset.view',
            'asset.create',
            'asset.update',
            'asset.delete',

            'category.view',
            'category.create',
            'category.update',
            'category.delete',

            'user.view',
            'user.create',
            'user.update',
            'user.delete',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $viewer = Role::firstOrCreate(['name' => 'viewer']);

        // Assign permissions
        $superAdmin->givePermissionTo(Permission::all());

        $admin->givePermissionTo([
            'asset.view',
            'asset.create',
            'asset.update',
            'asset.delete',

            'category.view',
            'category.create',
            'category.update',
            'category.delete',
        ]);

        $editor->givePermissionTo([
            'asset.view',
            'asset.create',
            'asset.update',
        ]);

        $viewer->givePermissionTo([
            'asset.view',
        ]);
    }
}
