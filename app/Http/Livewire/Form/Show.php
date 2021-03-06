<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;

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

    public function updatedInput($value, $index)
    {
        $index = explode('.', $index);

        if (count($index) == 3) {
            if (!$value) {
                $this->input[$index[0]][$index[1]][$index[2]] = 1;
                $value = 1;
            }
            $this->form[$index[0]][$index[1]][$index[2]] = $value;
            $this->form[$index[0]][$index[1]]->save();
        } else {
            if (!$value) {
                $this->input[$index[0]][$index[1]] = 1;
                $value = 1;
            }
            $this->form[$index[0]][$index[1]] = $value;
            $this->form[$index[0]]->save();
        }

        $this->alert('info', '???? ?????????? ???????????????? ??????????', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
    }

    public function mount($form_id) {
        $this->form = Form::findOrfail($form_id);
        $this->input['person'] = $this->form->person->toArray();
        $this->input['family_members'] = $this->form->family_members->toArray();
        $this->input['wife'] = $this->form->wife->toArray();
        $this->input['head_family'] = $this->form->head_family->toArray();
        $this->form->review = 1;
        $this->form->save();
    }

    public function render()
    {
        return view('livewire.form.show');
    }
}
