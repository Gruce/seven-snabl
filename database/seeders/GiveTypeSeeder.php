<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GiveType;
class GiveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $giveType = new GiveType;
        $giveType->name = 'مقدمة';
        $giveType->save();

        $giveType = new GiveType;
        $giveType->name = 'طلب';
        $giveType->save();
    }
}
