<?php

namespace App\Http\Livewire\Give;

use Livewire\Component;
use App\Models\{
    Form,
    GiveForm,
    GiveType,
};
use WireUi\Traits\Actions;

class Show extends Component
{
    use Actions;
    protected $listeners = ['$refresh'];

    public $input;

    protected $rules = [

        'input.give_forms.note' => 'required',
        'input.give_type.name' => 'required',
        // 'input.give_types.name' => 'required',


    ];

    public function updatedInput($value, $index){
        $index = explode('.', $index);
        // if (count($index) == 3) {
        // dg($index);

        //     $this->give_forms[$index[0]][$index[1]][$index[2]] = $value;
        //     $this->give_forms[$index[0]][$index[1]]->save();

        // } else {
            $this->give_forms[$index[1]][$index[2]] = $value;
            $this->give_forms[$index[1]]->save();
        // }

        $this->notification()->info(
            $title = 'تم تحديث البيانات بنجاح',
        );
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
        $this->notification()->success(
            $title = 'تم حذف البيانات بنجاح',
        );
    }

    public function mount(){
        $this->give_forms = GiveForm::get();

        $this->input['give_forms'] = $this->give_forms->toArray();
        $this->input['give_type'] = $this->give_forms->give_type->toArray();


    }

    public function render()
    {
        $gives = GiveForm::with(
            [
                'give_type:id,name',
                // 'form',
            ]
        )->get();
        return view('livewire.give.show', compact('gives'));
    }
}
