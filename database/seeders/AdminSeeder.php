<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'   => 'زهرا رهنما',
                'mobile' => '09306756076',
                'password'  => bcrypt('12345678'),
                'mobile_verified_at' => now(),
            ],
            [
                'name'   => 'علی مرادی',
                'mobile' => '09392974215',
                'password'  => bcrypt('12345678'),
                'mobile_verified_at' => now(),
            ],
        ];

        $adminRole = Role::firstWhere('name', 'admin');

        foreach ($users as $userData) {
            $user = User::firstOrCreate(['mobile' => $userData['mobile']], $userData);
            $user->assignRole($adminRole);
        }
    }

}
