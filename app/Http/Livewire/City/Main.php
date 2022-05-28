<?php

namespace App\Http\Livewire\City;

use Livewire\Component;
use App\Models\City;
class Main extends Component
{
    public $searchCity;
    protected $listeners = [ '$refresh' ];
    protected $queryString = ['searchCity'];
    public function render()
    {


        return view('livewire.city.main');
    }

}
