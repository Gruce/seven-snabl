<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HelperTrait;

class GiveType extends Model
{
    use HasFactory;
    // use SoftDeletes;
    use helperTrait;

    public function form_gives(){
        return $this->hasMany(GiveForm::class);
    }
    public function add($data){

        $this->name=$data['name'];
        $this->save();
    }

}
