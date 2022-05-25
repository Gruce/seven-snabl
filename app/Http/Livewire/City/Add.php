<?php

namespace App\Http\Livewire\City;

use Livewire\Component;
use App\Models\City;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Add extends Component
{
    use LivewireAlert;
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
        $this->alert('success', 'تم إضافة البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
        $this->emitUp('$refresh');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.city.add');
    }
}
