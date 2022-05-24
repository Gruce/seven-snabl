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
    protected $listeners = ['$refresh'];

    public $input;

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
    public function confirm($id, $fun)
    {
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

    public function delete($id)
    {
        $city = GiveForm::findOrfail($id);
        $city->delete();
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
