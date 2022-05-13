<?php

namespace App\Http\Livewire\Form;

use App\Models\Form;
use App\Models\HeadOfTheFamilyInfo;
use App\Models\PersonalInfo;
use App\Models\WifeInfo;
use App\Models\City;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class Add extends Component
{
    public $form;
    
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
        'form.wife.job' => 'required',
        'form.wife.state' => 'required',

        // City
        'form.city.id' => 'required',

        'form.family_members.*.name' => 'required',
    ];

    public function addFamilyMember(){
        $this->form['family_members'][] = [
            'name' => '',
        ];
    }
    public function deleteFamilyMember($index){
        unset($this->form['family_members'][$index]);
    }

    public function updatedFormPersonFamilyCount(){
        $this->form['family_members'] = [];
        foreach(range(1, $this->form['person']['family_count']) as $member)
            $this->form['family_members'][] = [
                'name' => '',
            ];
    }

    public function mount(){
        $this->cities = City::get(['id', 'name'])->toArray();
        $this->form['city']['id'] = 1;
    }

    public function save() {
        $this->validate();

        $form = new Form();
        $form->add($this->form);
    }

    public function render(){
        return view('livewire.form.add');
    }
}