<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;

class Show extends Component
{
    use LivewireAlert;
    public $input;
    protected $listeners = ['$refresh'];

    protected $rules = [
        'input.user.*.name' => 'required',
        'input.user.*.password' => 'required',
        'input.user.*.email' => 'required',
        'input.user.*.is_admin' => 'required',
        'input.user.*.phonenumber' => 'required',

    ];

    public function confirm($id, $fun)
    {
        $this->notification()->confirm([
            'title'       => 'هل انت متاكد',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'نعم',
                'method' => $fun,
                'params' => $id,
            ],
            'reject' => [
                'label'  => 'لا',
            ],
        ]);
    }

    public function delete($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        $this->alert('success', 'تم حذف البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);

        $this->emitUp('$refresh');
    }

    public function updatedInput($value, $index)
    {
        $index = explode('.', $index);
        // dg($index);

        $this->user[$index[1]][$index[2]] = $value;

        $this->user[$index[1]]->save();

        $this->alert('info', 'تم تحديث البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);

    }

    public function mount()
    {
        $this->user = User::get();
        $this->input['user'] = $this->user->toArray();
    }
    public function render()
    {
        $user = User::get();
        return view('livewire.admin.show', compact('user'));
    }
}
