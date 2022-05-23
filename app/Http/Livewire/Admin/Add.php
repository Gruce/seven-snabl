<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use WireUi\Traits\Actions;

class Add extends Component
{
    public $user;
    use Actions;
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

        $this->notification()->success(
            $title = 'تم إضافة البيانات بنجاح',
        );

        $this->emitUp( '$refresh');
        $this->user=[];

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
