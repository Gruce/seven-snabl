<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;
class Card extends Component
{
    public Form $form;
    public function mount(){
        $this->family_count = $this->form->family_members->count();
    }
    

    public function render()
    {
        return view('livewire.form.card');
    }
}
