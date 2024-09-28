<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Developer
        $developer_permission = Permission::all();
        Role::findOrFail(1)->permissions()->sync($developer_permission->pluck('id'));

        // Admin
        $admin_permission = $developer_permission->filter(function ($permission) {
            return substr($permission->name, 0, 5) !== 'role-' &&
                    substr($permission->name, 0, 11) !== 'permission-';
        });
        Role::findOrFail(2)->permissions()->sync($admin_permission);

        // User
        $user_permission = $developer_permission->filter(function ($permission) {
            return substr($permission->name, 0, 5) !== 'role-' &&
                substr($permission->name, 0, 11) !== 'permission-' &&
                substr($permission->name, 0, 5) !== 'user-';
        });
        Role::findOrFail(3)->permissions()->sync($user_permission);
    }
}
