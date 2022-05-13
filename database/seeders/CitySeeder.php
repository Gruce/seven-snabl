<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City;
        $city->name = 'البصرة';
        $city->code = '#345';
        $city->save();

        $city = new City;
        $city->name = 'بغداد';
        $city->code = '#657';
        $city->save();
    }
}
