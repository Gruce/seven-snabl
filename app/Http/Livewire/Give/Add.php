<?php

namespace App\Http\Livewire\Give;

use App\Models\Form;
use Livewire\Component;

class Add extends Component
{
    public Form $form;
    public function render()
    {
        return view('livewire.give.add');
    }
}
