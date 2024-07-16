<?php

namespace Database\Seeders;

use App\Models\Cloth;
use Illuminate\Database\Seeder;

class ClothSeeder extends Seeder
{
    public function run(): void
    {
        Cloth::create(['name' => 'کت']);
        Cloth::create(['name' => 'شلوار']);
        Cloth::create(['name' => 'جلیقه']);
        Cloth::create(['name' => 'پیراهن']);

    }
}
