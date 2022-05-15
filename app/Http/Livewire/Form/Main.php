<?php

namespace App\Http\Livewire\Form;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\{
    Form,
    City
};

class Main extends Component {
    use WithPagination;
    public $filter;

    public function mount(){
        $this->filter['city_id'] = null;
        $this->filter['person']['level'] = null;
        $this->filter['search'] = null;
        $this->filter['review'] = null;
    }

    public function render(){
        $forms = Form::with('city:id,name')->whereExist(collect($this->filter)->toFilter())->whereExist(
            [
                ['id' , '%' . $this->filter['search'] . '%' , 'LIKE'],
            ]
        )->get();
        dg($this->filter);
        return view('livewire.form.main', compact('forms'));
    }
}
