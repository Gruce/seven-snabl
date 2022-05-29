<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;
use App\Models\GiveType;
class ShowGive extends Component
{

    public function mount($form_id)
    {
        $this->form = Form::findOrFail($form_id);
        $this->gives=$this->form->gives;
        //  dd($this->gives);
    }
    public function render()
    {
        $give_types = GiveType::get()->toArray();
        return view('livewire.form.show-give', compact('give_types'));
    }
}
