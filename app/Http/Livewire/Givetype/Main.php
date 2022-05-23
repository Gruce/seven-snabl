<?php

namespace App\Http\Livewire\Givetype;

use App\Models\GiveType;
use Livewire\Component;
use WireUi\Traits\Actions;

class Main extends Component
{
    use Actions;

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
        $this->notification()->success(
            $title = 'تم حذف البيانات بنجاح',
        );
    }

    public function updatedInput($value, $index){
        $index = explode('.', $index);
        // dg($index);

            $this->give_types[$index[1]][$index[2]] = $value;

            $this->give_types[$index[1]]->save();


        $this->notification()->info(
            $title = 'تم تحديث البيانات بنجاح',
        );
    }
    public function mount(){
        $this->give_types = GiveType::get();
        $this->input['give_types'] = $this->give_types->toArray();

    }

    public function render()
    {
        $gives = GiveType::get();
        return view('livewire.givetype.main', compact('gives'));
    }
}
