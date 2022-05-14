<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
class WifeInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $appends = ['is_mis_name','is_alive' ];
    ### START RELATIONS ###
    public function form(){
        return $this->belongsTo(Form::class);
    }
    ### END RELATIONS ###

    ### START MATHOD ###

    public function add($data){
        $this->fill($data);
        $this->save();
    }

    ### END MATHOD ###

    ### Accessors & Mutators ###

    protected function isMisName(): Attribute {
        return Attribute::make(
            get: function () {
                switch ($this->is_mis){
                    case true:
                        return 'سيد';
                    case false:
                        return 'عامي';
                }
            },
        );
    }

    protected function isAlive(): Attribute {
        return Attribute::make(
            get: function () {
                switch ($this->is_aliv){
                    case true:
                        return 'حي';
                    case false:
                        return 'متوفي';
                }
            },
        );
    }

    ### END Accessors & Mutators ###
}
