<?php

namespace App\Http\Livewire\Givetype;

use App\Models\GiveType;
use Livewire\Component;

class Add extends Component
{
    public $give;

    protected $rules = [

        'give.name' => 'required',


    ];

    public function save()
    {

        $this->validate();
        $give = new GiveType;
        $give->add($this->give);
        $this->notification()->success(
            $title = 'تم إضافة البيانات بنجاح',
        );
        $this->emitTo('give.main', '$refresh');
    }
    public function render()
    {

        return view('livewire.givetype.add');
    }
}
