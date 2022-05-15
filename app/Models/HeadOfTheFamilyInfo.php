<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
class HeadOfTheFamilyInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $appends = ['is_mr_name','is_alive',
    'form_id',
    'name',
    'is_mr',
    'is_alive',
    'job',
    'salary',
    ];

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



    protected function isMrName(): Attribute {
        return Attribute::make(
            get: function () {
                switch ($this->is_mr){
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
}
