<?php

namespace App\Http\Livewire\Give;

use Livewire\Component;
use App\Models\{
    Form,
    GiveForm,
    GiveType,
};
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh' , 'delete'];

    public $input , $ID;

    protected $rules = [

        'input.give_forms.*.note' => 'required',
        'input.give_forms.*.give_type_id' => 'required',
        // 'input.give_type.name' => 'required',


    ];

    public function updatedInput($value, $index)
    {
        $index = explode('.', $index);

        $this->give_forms[$index[1]][$index[2]] = $value;
        $this->give_forms[$index[1]]->save();

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


    public function delete(){
        $give = GiveForm::findOrfail($this->ID);
        $give->delete();
        $this->alert('success', 'تم حذف البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
    }

    public function mount()
    {
        $this->give_forms = GiveForm::get();
        $this->input['give_forms'] = $this->give_forms->toArray();
    }

    public function render()
    {
        $gives = GiveForm::with(
            [
                'give_type:id,name',
            ]
        )->get();

        $give_types = GiveType::get()->toArray();

        return view('livewire.give.show', compact('gives', 'give_types'));
    }
}
