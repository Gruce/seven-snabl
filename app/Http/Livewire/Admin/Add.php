<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    public $user;
    use LivewireAlert;
    protected $rules = [
        // user
        'user.name' => 'required',
        'user.email' => 'required',
        'user.password' => 'required',
        'user.is_admin' => 'required',
        'user.phonenumber' => 'required',

    ];
    public function save()
    {
        $this->validate();
        $user = new User;
        $user->add($this->user);

        $this->alert('success', 'تم إضافة البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);


        $this->emitUp('$refresh');
        $this->user = [];
    }

    public function mount()
    {
        $this->user['is_admin'] = 1;
    }
    public function render()
    {

        return view('livewire.admin.add');
    }
}
