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

        $form = Form::create([
            'user_id' => 1,
            'city_id' => 1,
        ]);

        // Head Family Info

        $head_family = new HeadOfTheFamilyInfo;
        $head_family->name = 'حسن حازم';
        $head_family->is_mr = 1;
        $head_family->job = "صباغ";
        $head_family->salary = 200000;
        $head_family->is_alive = 1;
        $form->head_family()->save($head_family);

        // Wife Info

        $wife = new WifeInfo;
        $wife->name = "هدى عمار جاسم";
        $wife->state = 1;
        $form->wife()->save($wife);

        // Personal Info

        $person = new PersonalInfo;
        $person->level = 1;
        $person->location = 'بصرة';
        $person->point = "جسر الحوامد";
        $person->location_type = 1;
        $person->rent = 2000;
        $person->family_work = "اي شي";
        $person->family_count = 4;
        $person->have_salary = 400000;
        $person->salary = 600000;
        $person->father_phonenumber = "077154906";
        $person->mother_phonenumber = "076169507";
        $form->person()->save($person);

        // Family Members

        $family_member = new FamilyMember;
        $family_member->name = "حسن كاظم";
        $family_member->kinship =1;
        $family_member->birthday = "2020-05-11";
        $family_member->is_mr = 1;
        $family_member->job = "صباغ";
        $family_member->health_state = "جيدة";
        $family_member->note = "لا يوجد";
        $form->family_members()->save($family_member);

    }
}
