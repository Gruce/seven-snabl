<?php

namespace App\Http\Livewire\City;

use Livewire\Component;
use App\Models\City;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh'  , 'delete'];
    // public function mount(){
    //     $this->cities = City::get();

    // }
    public $input , $ID,$searchCity;
    protected $queryString = ['searchCity'];
    protected $rules = [
        'input.cities.*.name' => 'required',
        'input.cities.*.code' => 'required',
    ];




    public function delete()
    {
        $city = City::findOrfail($this->ID);
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

    public function confirmed($id){
        $this->ID = $id;
        $this->confirm('هل انت متأكد؟', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => "كلا",
            'confirmButtonText' =>  'نعم',
            'onConfirmed' => 'delete',
        ]);
    }


    public function mount()
    {
        $this->cities = City::get();
        $this->input['cities'] = $this->cities->toArray();
    }

    public function render()
    {
        $searchCity= '%'.$this->searchCity.'%';
        if($this->searchCity){
        $cities = City::where('name', 'like', $searchCity)
        ->orWhere('code', 'LIKE', $searchCity )->get();
    }
        else{
            $cities = City::get();
        }
        dg($searchCity);
        return view('livewire.city.show', compact('cities'));
    }
}
