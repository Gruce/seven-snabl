<?php

namespace App\Http\Livewire\Givetype;

use App\Models\GiveType;
use Livewire\Component;
use WireUi\Traits\Actions;

class Add extends Component
{
    public $give;
    use Actions;
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
        $this->emitUp( '$refresh');
    }
    public function render()
    {

        return view('livewire.givetype.add');
    }
}
