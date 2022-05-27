<?php

namespace App\Http\Livewire\Givetype;

use App\Models\GiveType;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    public $give;
    use LivewireAlert;
    protected $rules = [
        'give.name' => 'required',
    ];

    public function save()
    {
        $this->validate();
        $give = new GiveType;
        $give->add($this->give);
        $this->alert('success', 'تم إضافة البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
        $this->emitUp('$refresh');
    }
    public function render()
    {

        return view('livewire.givetype.add');
    }
}
