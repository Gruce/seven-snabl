<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;

class Main extends Component {

    public function render()
    {
        $forms = Form::get();
        return view('livewire.form.main', compact('forms'));
    }
}
