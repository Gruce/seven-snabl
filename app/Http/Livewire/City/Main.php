<?php

namespace App\Http\Livewire\City;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = [ '$refresh' ];
    public function render()
    {
        return view('livewire.city.main');
    }
}
