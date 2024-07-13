<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create(['name' => 'آذربایجان شرقی']);
        Province::create(['name' => 'آذربایجان غربی']);
        Province::create(['name' => 'اردبیل']);
        Province::create(['name' => 'اصفهان']);
        Province::create(['name' => 'البرز']);
        Province::create(['name' => 'ایلام']);
        Province::create(['name' => 'بوشهر']);
        Province::create(['name' => 'تهران']);
        Province::create(['name' => 'چهارمحال و بختیاری']);
        Province::create(['name' => 'خراسان جنوبی']);
        Province::create(['name' => 'خراسان رضوی']);
        Province::create(['name' => 'خراسان شمالی']);
        Province::create(['name' => 'خوزستان']);
        Province::create(['name' => 'زنجان']);
        Province::create(['name' => 'سمنان']);
        Province::create(['name' => 'سیستان و بلوچستان']);
        Province::create(['name' => 'فارس']);
        Province::create(['name' => 'قزوین']);
        Province::create(['name' => 'قم']);
        Province::create(['name' => 'کردستان']);
        Province::create(['name' => 'کرمان']);
        Province::create(['name' => 'کرمانشاه']);
        Province::create(['name' => 'کهگیلویه و بویراحمد']);
        Province::create(['name' => 'گلستان']);
        Province::create(['name' => 'گیلان']);
        Province::create(['name' => 'لرستان']);
        Province::create(['name' => 'مازندران']);
        Province::create(['name' => 'مرکزی']);
        Province::create(['name' => 'هرمزگان']);
        Province::create(['name' => 'همدان']);
        Province::create(['name' => 'یزد']);
    }
}
