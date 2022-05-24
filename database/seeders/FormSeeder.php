<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    Form,
    City,
    PersonalInfo,
    HeadOfTheFamilyInfo,
    WifeInfo,
    FamilyMember,
};

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for ($i=0; $i < 10; $i++) {

        $form = new Form;
        $form->user_id = 1;
        $form->city_id = rand(1,3);

        $form->save();

        $form->add([
            'person' => [
                'level' => rand(1,4),
                'location' => 'شط العرب',
                'point' => 'جسر الحوامد',
                'location_type' => rand(1,4),
                'rent' => 300000,
                'family_work' => 'اي شي',
                'family_count' => 5,
                'salary_type' => 1,
                'salary' => 200000,
                'father_phonenumber' => '0123456789',
                'mother_phonenumber' => '0123456709',
            ],
            'head_family' => [
                'name' => 'فلان فلان فلان',
                'is_mr' => 2,
                'job' => 'مدرس',
                'salary' => 200000,
            ],
            'wife' => [
                'name' => 'زوجة',
                'state' => rand(1,4),
            ],
            'family_members' => [
                [
                    'name' => 'ابن عبد العزيز',
                    'is_mr' => rand(1,2),
                    'kinship' => rand(1,4),
                    'birthday' => '2020-01-01',
                    'health_state' => 'مريض',
                    'job' => 'مدرس',
                    'note' => 'لا يعمل',
                ],
                [
                    'name' => 'ابن عبد عبدالله',
                    'is_mr' => rand(1,2),
                    'kinship' => rand(1,4),
                    'birthday' => '2020-01-01',
                    'health_state' => 'صاحي',
                    'job' => 'مدرس',
                    'note' => 'لا يعمل',
                ]
            ]
        ]);

    }

    }
}
