<?php

namespace App\Http\Livewire\City;

use Livewire\Component;
use App\Models\City;
use WireUi\Traits\Actions;


class Add extends Component
{
    use Actions;
    public $city;

    protected $rules = [
        // City
        'city.name' => 'required',
        'city.code' => 'required',
    ];

    public function save()
    {
        $this->validate();
        $city = new City;
        $city->add($this->city);
        $this->notification()->success(
            $title = 'تم إضافة البيانات بنجاح',
        );
        $this->emitUp( '$refresh');
    }


    public function render()
    {
        return view('livewire.city.add');
    }
}
