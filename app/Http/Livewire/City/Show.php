<?php

namespace App\Http\Livewire\City;

use Livewire\Component;
use App\Models\City;
class Show extends Component
{
    protected $listeners = [ '$refresh' ];
    // public function mount(){
    //     $this->cities = City::get();

    // }
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


    public function render()
    {
       $cities = City::get();
        return view('livewire.city.show',compact('cities'));
    }
}
