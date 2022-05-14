<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GiveForme;
class GiveFormeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $giveForme = new GiveForme;
        $giveForme->form_id = 1;
        $giveForme->give_id = 1;
        $giveForme->note = 'ملاحظة ملاحظة';
        
        $giveForme->save();
    }
}
