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
    public $input,$city_id;

    protected $rules = [
        'input.name' => 'required',
        'input.code' => 'required',
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

    }

    public function updatedInput($value, $index){
        $index = explode('.', $index);

        if (count($index) == 3) {
            dg($index);
            $this->city[$index[0]][$index[1]][$index[2]] = $value;
            $this->city[$index[0]][$index[1]]->save();
        } else {
            $this->city[$index[0]][$index[1]] = $value;
            $this->city[$index[0]]->save();
        }

        $this->notification()->info(
            $title = 'تم تحديث البيانات بنجاح',
        );
    }
    public function show($id){

        $this->city = City::findOrfail($id);
            $this->input['name'] = $this->city->name;
            $this->input['code'] = $this->city->code;
            $this->city->save();

    }

    // public function mount()
    // {


    // }

    public function render()
    {
       $cities = City::get();
        return view('livewire.city.show',compact('cities'));
    }
}
