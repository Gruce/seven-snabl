<?php

namespace App\Http\Livewire\Form;
use Illuminate\Support\Arr;
use Livewire\Component;
use App\Models\{
    Form,
    City
};

class Main extends Component {
    public $filter;

    public function mount(){
        $this->filter['city_id'] = null;
        $this->filter['person']['level'] = null;
        $this->filter['search'] = null;
    }

    public function render(){
        $forms = Form::whereExist(collect($this->filter)->toFilter())->whereExist(
            [
                ['id' , '%' . $this->filter['search'] . '%' , 'LIKE'],
            ]
        )->get();

        return view('livewire.form.main', compact('forms'));
    }
}
