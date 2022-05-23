<?php

namespace App\Http\Livewire\Form;

use App\Models\Form;

use App\Models\City;
use Livewire\Component;
use WireUi\Traits\Actions;

class Add extends Component
{
    use Actions;
    public $form;

    protected $rules = [
        // Personal Info
        'form.person.level' => 'required',
        'form.person.location' => 'required',
        'form.person.point' => '',
        'form.person.location_type' => 'required',
        'form.person.rent' => '',
        'form.person.family_work' => 'required',
        'form.person.family_count' => 'required',
        'form.person.salary_type' => 'required',
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

        // City
        'form.city.id' => 'required',

        'form.family_members.*.name' => 'required',
        'form.family_members.*.kinship' => 'required',
        'form.family_members.*.birthday' => 'required',
        'form.family_members.*.is_mr' => 'required',
        'form.family_members.*.gender' => 'required',
        'form.family_members.*.job' => '',
        'form.family_members.*.health_state' => 'required',
        'form.family_members.*.note' => '',
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
        $this->form['family_members'] = array();
        foreach(range(1, $this->form['person']['family_count']) as $member)
            $this->form['family_members'][] = [
                'name' => '',
                'kinship' => '',
                'birthday' => '',
                'is_mr' => '',
                'gender' => '',
                'job' => '',
                'health_state' => '',
                'note' => '',
            ];
    }

    public function mount(){
        $this->cities = City::get(['id', 'name']);
        // Initiate data
        $this->form['city']['id'] = 1;
        $this->form['person']['level'] = 1;
        $this->form['person']['location_type'] = 1;
        $this->form['head_family']['is_mr'] = 2;
        $this->form['head_family']['is_alive'] = 1;
        $this->form['wife']['name'] = '';
        $this->form['wife']['state'] = 1;
        $this->form['wife']['is_mis'] = 1;
        $this->form['person']['father_phonenumber'] = null;
        $this->form['person']['mother_phonenumber'] = null;
        $this->form['person']['salary_type'] = 1;
        $this->form['person']['rent'] = null;
        $this->form['person']['salary'] = null;
        $this->form['head_family']['salary'] = null;
    }

    public function save() {
        dg($this->form);
        $this->validate();
        $form = new Form;
        $form->user_id = auth()->id();
        $form->city_id = $this->form['city']['id'];
        $form->save();
        $form->add($this->form);

        $this->notification()->success(
            $title = 'تم إضافة البيانات بنجاح',
        );
        $this->emitTo('city.show', '$refresh');

        $this->form = [];


    }

    public function render(){
        return view('livewire.form.add');
    }
}
