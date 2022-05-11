<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

use function Psy\debug;

class Test extends Component
{
    use Actions;
    public function tt()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'acceptLabel' => 'Yes, save it',
            'method'      => 'save',
            'params'      => 'Saved',
        ]);
    }
    public function render()
    {
        return view('livewire.test');
    }
}
