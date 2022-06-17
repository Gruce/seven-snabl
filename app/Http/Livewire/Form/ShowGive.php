<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;
use App\Models\GiveType;
use App\Models\GiveForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShowGive extends Component
{
    protected $listeners = ['$refresh', 'delete'];
    use LivewireAlert;
    public $ID, $form_id, $input, $give_forms;

    protected $rules = [

        'input.give_forms.*.note' => 'required',
        'input.give_forms.*.give_type_id' => 'required',
        // 'input.give_type.name' => 'required',
    ];

    public function updatedInput($value, $index)
    {
        $index = explode('.', $index);
        // dg($index);

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

    public function confirmed($id)
    {
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


    public function delete()
    {
        $give = GiveForm::findOrfail($this->ID);
        $give->delete();
        $this->alert('success', 'تم حذف البيانات بنجاح', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
        $this->emit('$refresh');
    }


    public function render()
    {
        $this->form = Form::findOrFail($this->form_id);
        // $this->gives = $this->form->gives;

        $give_types = GiveType::get()->toArray();

        return view('livewire.form.show-give', compact('give_types'));
    }
}
