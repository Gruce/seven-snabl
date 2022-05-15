<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;
use WireUi\Traits\Actions;

class Show extends Component
{
    use Actions;

    public $input;

    protected $rules = [
        // Personal Info
        'input.person.level' => 'required',
        'input.person.location' => 'required',
        'input.person.point' => 'required',
        'input.person.location_type' => 'required',
        'input.person.rent' => 'required',
        'input.person.family_work' => 'required',
        'input.person.family_count' => 'required',
        'input.person.have_salary' => 'required',
        'input.person.salary' => 'required',
        'input.person.father_phonenumber' => 'required',
        'input.person.mother_phonenumber' => 'required',

        // Head of the family
        'input.head_family.name' => 'required',
        'input.head_family.is_mr' => 'required',
        'input.head_family.job' => 'required',
        'input.head_family.is_alive' => 'required',
        'input.head_family.salary' => 'required',

        // Wife
        'input.wife.name' => 'required',
        'input.wife.is_mis' => 'required',
        'input.wife.state' => 'required',


        // Family Member
        'input.family_members.*.name' => 'required',
        'input.family_members.*.birthday' => 'required',
        'input.family_members.*.kinship' => 'required',
        'input.family_members.*.is_mr' => 'required',
        'input.family_members.*.job' => 'required',
        'input.family_members.*.health_state' => 'required',
        'input.family_members.*.note' => 'required',
    ];

    public function updatedInput($value, $index){
        $index = explode('.', $index);

        if (count($index) == 3) {
            dg($index);
            $this->form[$index[0]][$index[1]][$index[2]] = $value;
            $this->form[$index[0]][$index[1]]->save();
        } else {
            $this->form[$index[0]][$index[1]] = $value;
            $this->form[$index[0]]->save();
        }

        $this->notification()->info(
            $title = 'تم تحديث البيانات بنجاح',
        );
    }

    public function mount($id){
        $this->form = Form::findOrfail($id);
        $this->input['person'] = $this->form->person->toArray();
        $this->input['family_members'] = $this->form->family_members->toArray();
        $this->input['wife'] = $this->form->wife->toArray();
        $this->input['head_family'] = $this->form->head_family->toArray();
        $this->form->review=true;
        $this->form->save();
    }

    public function render()
    {
        return view('livewire.form.show');
    }
}
