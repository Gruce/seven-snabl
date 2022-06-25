<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use App\Models\File;
class Card extends Component{

    use LivewireAlert;
    use WithPagination;
    protected $listeners = ['delete'];
    public Form $form;
    public function mount(){
        $this->family_count = $this->form->family_members->count();
    }

    public function confirmed($id){
        $this->form->id = $id;
        $this->confirm('هل انت متأكد؟', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => "كلا",
            'confirmButtonText' =>  'نعم',
            'onConfirmed' => 'delete',
        ]);
    }



    public function delete() {

        $form = Form::findOrFail($this->form->id);
        $form->delete();
        $this->alert('success', 'تم حذف البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
        $this->emitUp('$refresh');
    }

    public function render()
    {
        $files=File::where('form_id',$this->form->id)->paginate(3);
        return view('livewire.form.card',compact('files'));
    }
}
