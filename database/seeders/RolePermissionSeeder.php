<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'tailor'],
            ['name' => 'customer'],
        ];

        foreach ($roles as $roleData) {
            Role::create($roleData);
        }
    }
}
