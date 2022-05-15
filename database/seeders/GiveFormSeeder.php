<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GiveForm;

class GiveFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $giveForme = new GiveForm;
        $giveForme->form_id = 1;
        $giveForme->give_type_id = 1;
        $giveForme->note = 'ملاحظة ملاحظة';

        $giveForme->save();
    }
}
