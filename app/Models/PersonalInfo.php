<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    ### START RELATIONS ###

    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function head_family(){
        return $this->hasOne(HeadOfTheFamilyInfo::class);
    }

    public function wife(){
        return $this->hasOne(WifeInfo::class);
    }

    ### END RELATIONS ###

    ### START MATHOD ###

    public function add($data){
        $this->fill($data);
        $this->save();
    }

    ### END MATHOD ###
}
