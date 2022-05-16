<?php

namespace App\Http\Livewire\Give;

use Livewire\Component;
use App\Models\{
    Form,
    GiveForm
};
use WireUi\Traits\Actions;

class Show extends Component
{
    use Actions;
    protected $listeners = ['$refresh'];

    public $input;

    protected $rules = [

        'input.give.note' => 'required',
        'input.give.type' => 'required',
        'input.give.form_id' => 'required',

    ];

    public function updatedInput($value, $index){
        $index = explode('.', $index);

        if (count($index) == 3) {

            $this->form[$index[0]][$index[1]][$index[2]] = $value;
            $this->form[$index[0]][$index[1]]->save();
        } else {
            $this->form[$index[0]][$index[1]] = $value;
            $this->form[$index[0]]->save();
        }

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
