<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'permission-index',
            'permission-create',
            'permission-show',
            'permission-edit',
            'permission-destroy',

            'role-index',
            'role-create',
            'role-show',
            'role-edit',
            'role-destroy',

            'user-index',
            'user-create',
            'user-show',
            'user-edit',
            'user-destroy',

            'base-index',
            'base-create',
            'base-show',
            'base-edit',
            'base-destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
