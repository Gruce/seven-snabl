<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiveForm extends Model
{
    use HasFactory;


    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function give_type(){
        return $this->belongsTo(GiveType::class);
    }
    public function add($data){

        $this->note=$data['note'];
        $this->form_id=$data['form_id'];
        $this->give_type_id=$data['give_type_id'];

        $this->save();
    }
}
