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
            'کمر',
            'باسن',
            'ران',
            'زانو',
            'قدزانو',
            'قد',
            'دمپا',
            'فاق',
            'سرشانه',
            'پشت شانه',
            'آستین',
            'یقه',
            'دور سینه',
            'دور شکم',
            'توضیحات',
        ];

        foreach ($measurements as $measurementName) {
            Measurement::create(['title' => $measurementName]);
        }

        $clothes = [
            'کت'     => [10, 13, 14, 6, 11, 15],
            'شلوار'  => [1, 2, 3, 4, 5, 6, 7, 8, 15],
            'جلیقه'  => [6, 13, 15],
            'پیراهن' => [9, 10, 11, 12, 6, 15],
        ];

        foreach ($clothes as $clothName => $measurementIds) {
            $cloth = Cloth::create(['name' => $clothName]);
            $cloth->measurements()->attach($measurementIds);
        }
    }

}
