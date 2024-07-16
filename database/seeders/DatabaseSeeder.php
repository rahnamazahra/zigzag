<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProvinceSeeder::class,
            CitySeeder::class,
            RolePermissionSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            ClothMeasurementSeeder::class,
        ]);
    }
}
