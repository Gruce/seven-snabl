<?php

namespace App\Http\Livewire\Givetype;

use App\Models\GiveType;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Main extends Component
{
    use LivewireAlert;

    public $input;

    protected $rules = [
        'input.give_types.*.name' => 'required',

    ];

    protected $listeners = ['$refresh'];
    // public function mount(){
    //     $this->cities = City::get();

    // }

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
        $give = GiveType::findOrfail($id);
        $give->delete();
        $this->alert('success', 'تم حذف البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
    }

    public function updatedInput($value, $index)
    {
        $index = explode('.', $index);
        // dg($index);

        $this->give_types[$index[1]][$index[2]] = $value;

        $this->give_types[$index[1]]->save();


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
        $this->give_types = GiveType::get();
        $this->input['give_types'] = $this->give_types->toArray();
    }

    public function render()
    {
        $gives = GiveType::get();
        return view('livewire.givetype.main', compact('gives'));
    }
}
