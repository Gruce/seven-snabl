<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = [ '$refresh' ];

    public function render()
    {
        return view('livewire.admin.main');
    }
}
