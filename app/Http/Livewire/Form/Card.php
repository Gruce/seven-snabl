<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;
class Card extends Component
{
    public Form $form;
    public function mount(){
        $this->family_count = $this->form->family_members->count();
    }

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

    public function delete(Form $form){
        $form->delete();
        $this->notification()->success(
            $title = 'تم حذف البيانات بنجاح',
        );
        $this->emitUp('$refresh');


    }

    public function render()
    {
        return view('livewire.form.card');
    }
}
