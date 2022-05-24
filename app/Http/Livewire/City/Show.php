<?php

namespace App\Http\Livewire\City;

use Livewire\Component;
use App\Models\City;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh'];
    // public function mount(){
    //     $this->cities = City::get();

    // }
    public $input;

    protected $rules = [
        'input.cities.*.name' => 'required',
        'input.cities.*.code' => 'required',
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
        $city = City::findOrfail($id);
        $city->delete();
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

        $this->cities[$index[1]][$index[2]] = $value;

        $this->cities[$index[1]]->save();


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
        $this->cities = City::get();
        $this->input['cities'] = $this->cities->toArray();
    }

    public function render()
    {
        $cities = City::get();
        return view('livewire.city.show', compact('cities'));
    }
}
