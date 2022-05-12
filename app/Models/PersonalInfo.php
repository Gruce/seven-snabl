<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PersonalInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'family_work'
    ];

    protected $appends = ['level_name', 'location_name', 'have_salary' ];

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

    ### Accessors & Mutators ###

    protected function levelName(): Attribute {
        return Attribute::make(
            get: function () {
                if ($this->level)
                    switch ($this->level){
                        case 1:
                            return 'B1';
                        case 2:
                            return 'B2';
                        case 3:
                            return 'B3';
                        case 4:
                            return 'B4';
                    }
            },
        );
    }

    protected function locationName(): Attribute {
        return Attribute::make(
            get: function () {
                switch ($this->location_type){
                    case 1:
                        return 'ملك';
                    case 2:
                        return 'تجاوز';
                    case 3:
                        return 'ايجار';
                    case 4:
                        return 'زراعي';
                }
            },
        );
    }

    protected function haveSalary(): Attribute {
        return Attribute::make(
            get: function () {
                switch ($this->have_salary){
                    case 1:
                        return 'تقاعد';
                    case 2:
                        return 'رعاية';
                    case 3:
                        return 'مؤسسة';
                    case 4:
                        return 'مساعدات';
                    case 5:
                        return 'حكومي';
                }
            },
        );
    }
}
