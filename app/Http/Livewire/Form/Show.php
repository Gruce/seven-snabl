<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;

class Show extends Component
{

    protected $rules = [

        // Personal Info
        'form.person.level' => 'required',
        'form.person.location' => 'required',
        'form.person.point' => 'required',
        'form.person.location_type' => 'required',
        'form.person.rent' => 'required',
        'form.person.family_work' => 'required',
        'form.person.family_count' => 'required',
        'form.person.have_salary' => 'required',
        'form.person.salary' => 'required',
        'form.person.father_phonenumber' => 'required',
        'form.person.mother_phonenumber' => 'required',

        // Head of the family
        'form.head_family.name' => 'required',
        'form.head_family.is_mr' => 'required',
        'form.head_family.job' => 'required',
        'form.head_family.is_alive' => 'required',
        'form.head_family.salary' => 'required',

        // Wife
        'form.wife.name' => 'required',
        'form.wife.is_mis' => 'required',
        'form.wife.state' => 'required',


        // Family Member
        'form.family_members.name' => 'required',
        'form.family_members.birthday' => 'required',
        'form.family_members.kinship' => 'required',
        'form.family_members.is_mr' => 'required',
        'form.family_members.job' => 'required',
        'form.family_members.health_state' => 'required',
        'form.family_members.note' => 'required',
    ];

    public function mount($id)
    {

        $this->form = Form::findOrfail($id);
       
    }

    public function render()
    {
        return view('livewire.form.show');
    }
}
