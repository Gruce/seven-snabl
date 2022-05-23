<?php

namespace App\Http\Livewire\City;

use Livewire\Component;
use App\Models\City;
use WireUi\Traits\Actions;
class Show extends Component
{
    use Actions;
    protected $listeners = [ '$refresh' ];
    // public function mount(){
    //     $this->cities = City::get();

    // }
    public $input;

    protected $rules = [
        'input.cities.*.name' => 'required',
        'input.cities.*.code' => 'required',
    ];


    public function confirm($id,$fun){
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

    public function delete($id){
        $city = City::findOrfail($id);
        $city->delete();
        $this->notification()->success(
            $title = 'تم حذف البيانات بنجاح',
        );
        $this->emitUp('$refresh');


    }

    public function updatedInput($value, $index){
        $index = explode('.', $index);
        // dg($index);

            $this->cities[$index[1]][$index[2]] = $value;

            $this->cities[$index[1]]->save();


        $this->notification()->info(
            $title = 'تم تحديث البيانات بنجاح',
        );
    }


    public function mount(){
        $this->cities = City::get();
        $this->input['cities'] = $this->cities->toArray();
    }

    public function render()
    {
       $cities = City::get();
        return view('livewire.city.show',compact('cities'));
    }
}
