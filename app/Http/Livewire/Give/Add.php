<?php

namespace App\Http\Livewire\Give;

use App\Models\Form;
use App\Models\GiveForm;
use App\Models\GiveType;
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

    protected $listeners = [
        'getFormId'
    ];

    
    public function getFormId(Form $form) {
        $this->form = $form;
    }

    public function mount()
    {
        $this->form = new Form();
        $this->give['type'] = null;
        $this->gives = GiveType::get(['id', 'name']);
    }
    public function save() {
        $this->validate();
        $give = new GiveForm;
        $this->give['form_id'] = $this->form->id;
        $this->give['give_type_id'] = $this->give['type'];
        $give->add($this->give);

        $this->alert('success', 'تم إضافة البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
        
        $this->emitTo('give.main', '$refresh');
    }

    public function render()
    {
        return view('livewire.give.add');
    }
}
