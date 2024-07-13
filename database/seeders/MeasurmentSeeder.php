<?php

namespace Database\Seeders;

use App\Models\Measurment;
use Illuminate\Database\Seeder;

class MeasurmentSeeder extends Seeder
{
    public function run(): void
    {
        Measurment::create(['name' => 'دور بازو']);
        Measurment::create(['name' => 'دور کمر']);
        Measurment::create(['name' => 'دور شکم']);
        Measurment::create(['name' => 'دور سینه']);
        Measurment::create(['name' => 'ران']);
        Measurment::create(['name' => 'زانو']);
        Measurment::create(['name' => 'قد']);
    }
}
