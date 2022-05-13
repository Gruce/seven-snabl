<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    ### START RELATIONS ###
    public function forms(){
        return $this->hasMany(Form::class);
    }
    ### END RELATIONS ###

    ### START MATHOD ###

    public function add($data){
        $this->name = $data['name'];
        $this->code = $data['code'];
        $this->save();
    }

    ### END MATHOD ###

}
