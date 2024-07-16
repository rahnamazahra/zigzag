<?php

namespace Database\Seeders;

use App\Models\Cloth;
use App\Models\Measurement;
use Illuminate\Database\Seeder;

class ClothMeasurementSeeder extends Seeder
{
    public function run(): void
    {
        $measurements = [
            'دور بازو',
            'دور کمر',
            'دور شکم',
            'دور سینه',
            'ران',
            'زانو',
            'قد',
        ];

        foreach ($measurements as $measurementName) {
            Measurement::create(['title' => $measurementName]);
        }

        $clothes = [
            'کت'     => [1, 2, 3],
            'شلوار'  => [2, 3, 4],
            'جلیقه'  => [1, 4, 5],
            'پیراهن' => [3, 5, 6],
        ];

        foreach ($clothes as $clothName => $measurementIds) {
            $cloth = Cloth::create(['name' => $clothName]);
            $cloth->measurements()->attach($measurementIds);
        }
    }

}
