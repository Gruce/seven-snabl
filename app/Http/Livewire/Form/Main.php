<?php

namespace App\Http\Livewire\Form;

use App\Models\City;

use App\Models\Form;

use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $filter;
    public $form_id;

    protected $listeners = ['$refresh'];

    public function mount()
    {
        $this->cities = City::get(['id', 'name']);
        $this->filter['city_id'] = null;
        $this->filter['person']['level'] = null;
        $this->filter['search'] = null;
        $this->filter['review'] = null;
    }

    public function render()
    {
        $forms = Form::with(['city:id,name', 'gives' => function ($query) {
            return $query->latest()->take(3)->get();
        }])->orderByDesc('id');
        if (is_admin()) $forms->where('user_id', auth()->id());

        $forms = $forms->whereHas('head_family', function ($query) {
            $query->where('name', 'like', '%' . $this->filter['search'] . '%');
        })->orWhereHas('wife', function ($query) {
            $query->where('name', 'like', '%' . $this->filter['search'] . '%');
        })->orWhere('id', $this->filter['search']);

        $forms = $forms->whereExist(collect($this->filter)->toFilter())->paginate(10);

        return view('livewire.form.main', compact('forms'));
    }
}
