<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class FamilyMember extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $appends = ['kinship_name', 'is_mr_name', 'is_alive' ];

    public function form(){
        return $this->belongsTo(Form::class);
    }

    ### START MATHOD ###

    public function add($data){
        $this->fill($data);
        $this->save();
    }

    ### END MATHOD ###


    ### Accessors & Mutators ###

    protected function kinshipName(): Attribute {
        return Attribute::make(
            get: function () {
                switch ($this->kinship){
                    case 1:
                        return 'اب';
                    case 2:
                        return 'ام';
                    case 3:
                        return 'ابن';
                    case 4:
                        return 'جد';
                    case 5:
                        return 'جدة';
                    case 6:
                        return 'اخ';
                    case 7:
                        return 'اخت';
                    case 8:
                        return 'حفيد';
                }
            },
        );
    }

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
