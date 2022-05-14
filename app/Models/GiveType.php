<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiveType extends Model
{
    use HasFactory;

    public function form_gives(){
        return $this->hasMany(GiveForm::class);
    }
    public function add($data){
        
        $this->name=$data['name'];
        $this->save();
    }

}
