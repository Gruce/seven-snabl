<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\City;
use App\Models\Form;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{

    public function mount(){
        $this->total_form = Form::count() ?? 0;
        $this->total_form_month = Form::whereMonth('created_at', date('m'))->count() ?? 0;
        $this->total_form_year = Form::whereYear('created_at', date('Y'))->count() ?? 0;

        $this->users = User::get();
        $this->ctyies = City::get();
    }
    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
