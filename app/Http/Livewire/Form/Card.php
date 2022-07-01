<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Form;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use App\Models\File;
use Livewire\WithFileUploads;


class Card extends Component
{

    use LivewireAlert;
    use WithPagination, WithFileUploads;
    protected $listeners = ['delete'];
    public Form $form;
    public $filess = [];
    public function mount()
    {
        $this->family_count = $this->form->family_members->count();
    }


    // public function updatedFiles($filess)
    // {
    //     dd($filess);
    //     foreach ($this->filess as $file) {
    //         $ext = $file->extension();
    //         $name = \Str::random(10) . '.' . $ext;
    //         $file->storeAs('public/doc', $name);
    //         $data['path'] = $name;
    //         $data['name'] = $file->getClientOriginalName();
    //         $this->form->files()->create($data);
    //     }

    //     $this->emitSelf('$refresh');

    // }

    public function confirmed($id)
    {
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

    public function deleteFile($id)
    {
        File::findOrFail($id)->delete();
        $this->alert('success', 'تم حذف الملف', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        $this->emitSelf('$refresh');
    }



    public function delete()
    {

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
        $files = File::where('form_id', $this->form->id)->paginate(3);
        return view('livewire.form.card', compact('files'));
    }
}
