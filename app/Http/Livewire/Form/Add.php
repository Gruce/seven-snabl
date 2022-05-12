<?php

namespace App\Http\Livewire\Form;

use App\Models\Form;
use App\Models\HeadOfTheFamilyInfo;
use App\Models\PersonalInfo;
use App\Models\WifeInfo;
use Livewire\Component;

class Add extends Component
{
    public $head_name, $city_id, $level, $location, $point, $location_type, $rent, $family_work,
    $family_count, $have_salary, $person_salary, $father_phonenumber, $mother_phonenumber, $is_alive,
    $is_mr, $job, $head_salary,$is_mis, $wife_name, $state ;


    public function add() {
        $form = new Form;
        $form->add([
            'user_id' => auth()->id(),
            'city_id' => $this->city_id,
        ]);

        $person = new PersonalInfo;
        $person->add([
            'form_id' => $form->id,
            'level'   => $this->level,
            'location'=> $this->location,
            'point'=> $this->point,
            'location_type'=> $this->location_type,
            'rent'=> $this->rent,
            'family_work'=> $this->family_work,
            'family_count'=> $this->family_count,
            'have_salary' => $this->have_salary,
            'salary'      => $this->person_salary,
            'father_phonenumber' => $this->father_phonenumber,
            'mother_phonenumber' => $this->mother_phonenumber,
        ]);

        $head_family = new HeadOfTheFamilyInfo;
        $head_family->add([
            'form_id'=> $form->id,
            'name' => $this->head_name,
            'is_mr' => $this->is_mr,
            'job' => $this->job,
            'salary' => $this->head_salary,
        ]);

        $wife = new WifeInfo;
        $wife->add([
            'form_id'=> $form->id,
            'name' => $this->wife_name,
            'is_mis' => $this->is_mis,
            'state' => $this->state,
        ]);
    }

    public function render()
    {
        debug($this->city_id);
        return view('livewire.form.add');
    }
}
