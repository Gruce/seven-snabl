<?php

namespace App\Http\Livewire\Form;

use App\Models\Form;

use App\Models\City;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Add extends Component
{
    use LivewireAlert, WithFileUploads;
    public $form, $files = [];

    protected $rules = [
        // Personal Info
        'form.person.level' => 'required|integer',
        'form.person.location' => 'required',
        'form.person.point' => '',
        'form.person.location_type' => 'required|integer',
        'form.person.rent' => '',
        'form.person.family_work' => 'required',
        'form.person.family_count' => 'required|integer',
        'form.person.salary_type' => 'required|integer',
        'form.person.salary' => 'required',
        'form.person.father_phonenumber' => 'required',
        'form.person.mother_phonenumber' => 'required',

        // Head of the family
        'form.head_family.name' => 'required',
        'form.head_family.is_mr' => 'required|integer',
        'form.head_family.job' => 'required',
        'form.head_family.is_alive' => 'required|integer',
        'form.head_family.salary' => 'required',

        // Wife
        'form.wife.name' => 'required',
        'form.wife.is_mis' => 'required|integer',
        'form.wife.state' => 'required|integer',

        // City
        'form.city.id' => 'required',

        'form.family_members.*.name' => 'required',
        'form.family_members.*.kinship' => 'required|integer',
        'form.family_members.*.birthday' => 'required',
        'form.family_members.*.is_mr' => 'required|integer',
        'form.family_members.*.gender' => 'required',
        'form.family_members.*.job' => '',
        'form.family_members.*.health_state' => 'required',
        'form.family_members.*.note' => '',
    ];


    // public function addFamilyMember()
    // {
    //     $this->form['family_members'][] = [
    //         'name' => '',
    //     ];
    // }

    public function deleteFamilyMember($index)
    {
        unset($this->form['family_members'][$index]);
    }

    public function updatedFormPersonFamilyCount()
    {
        $this->form['family_members'] = array();
        foreach (range(1, $this->form['person']['family_count']) as $member)
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

    public function mount()
    {
        $this->cities = City::get(['id', 'name']);
        // Initiate data
        $this->form['city']['id'] = '';
        $this->form['person']['level'] = '';
        $this->form['person']['location_type'] = '';
        $this->form['head_family']['is_mr'] = '';
        $this->form['head_family']['is_alive'] = '';
        $this->form['wife']['name'] = '';
        $this->form['wife']['state'] = '';
        $this->form['wife']['is_mis'] = '';
        $this->form['person']['father_phonenumber'] = '';
        $this->form['person']['mother_phonenumber'] = '';
        $this->form['person']['salary_type'] = '';
        $this->form['person']['rent'] = 0;
        $this->form['person']['salary'] = '';
        $this->form['head_family']['salary'] = '';
    }

    public function save()
    {
        dg($this->form);
        $this->validate();
        $form = new Form;
        $form->user_id = auth()->id();
        $form->city_id = $this->form['city']['id'];
        $form->save();
        $form->add($this->form);

        $this->alert('success', 'تم إضافة البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);

        if (isset($this->files)) {
            foreach ($this->files as $file) {
                $ext = $file->extension();
                $name = \Str::random(10) . '.' . $ext;
                $file->storeAs('public/doc', $name);
                $data['path'] = $name;
                $data['name'] = $file->getClientOriginalName();
                $form->files()->create($data);
            }
        }
        // if ($form->save() && $form->add($this->form)) {


        // $this->emitTo('city.show', '$refresh');
        // $this->emitUp('$refresh');

        // $this->form = [];
        // } else {
        //     $this->alert('error', 'يرجا التاكد من الحقول المطلوبة', [
        //         'position' => 'top-start',
        //         'timer' => 3000,
        //         'toast' => true,
        //         'timerProgressBar' => true,
        //         'width' => '300',
        //     ]);
        // }

    }

    public function render()
    {
        return view('livewire.form.add');
    }
}
