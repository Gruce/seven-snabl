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
    protected $appends = ['is_mis_name','is_alive','wife_state' ];
    protected $fillable = ['name','is_mis', 'state'];

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
                    case 1:
                        return 'سيد';
                    case 2:
                        return 'عامي';
                }
            },
        );
    }

    protected function isAlive(): Attribute {
        return Attribute::make(
            get: function () {
                switch ($this->is_aliv){
                    case 1:
                        return 'حي';
                    case 2:
                        return 'متوفي';
                }
            },
        );
    }

    protected function wifeState(): Attribute {
        return Attribute::make(
            get: function () {
                switch ($this->state){
                    case 1:
                        return 'حي';
                    case 2:
                        return 'متوفية';
                    case 3:
                        return 'مطلقة';
                    case 4:
                        return 'ارملة';
                }
            },
        );
    }

    ### END Accessors & Mutators ###
}
