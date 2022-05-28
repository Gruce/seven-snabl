<?php

namespace App\Http\Livewire\City;

use Livewire\Component;
use App\Models\City;
class Main extends Component
{
    public $searchCity;
    protected $listeners = [ '$refresh' ];

    public function render()
    {
        $this->emit('search', $this->searchCity);
        return view('livewire.city.main');
    }

}
