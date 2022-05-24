<?php

namespace App\Http\Livewire\Give;

use App\Models\Form;
use App\Models\GiveForm;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use LivewireAlert;
    public $give, $form;
    protected $rules = [

        'give.note' => 'required',
        'give.type' => 'required',
        'give.form_id' => 'required',

    ];

    public function mount(Form $form)
    {
        $this->form = $form;
        $this->give['type'] = null;
    }
    public function save()
    {

        // $this->validate();
        $give = new GiveForm;
        $this->give['form_id'] = $this->form->id;
        $this->give['give_type_id'] = $this->give['type'];
        $give->add($this->give);
        $this->notification()->success(
            $title = 'تم إضافة هبة بنجاح',
        );
        $this->emitTo('give.main', '$refresh');
    }

    public function render()
    {
        return view('livewire.give.add');
    }
}
