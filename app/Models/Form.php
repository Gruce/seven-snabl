<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\{
    City,
    PersonalInfo,
    HeadOfTheFamilyInfo,
    WifeInfo,
    FamilyMember,
};

class Form extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HelperTrait;

    protected $fillable = ['user_id','city_id'];

    ### START RELATIONS ###
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function person(){
        return $this->hasOne(PersonalInfo::class);
    }

    public function family_members(){
        return $this->hasMany(FamilyMember::class);
    }

    public function gives(){
        return $this->hasMany(GiveForm::class);
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
        // personal info
        $this->person()->create($data['person']);

        // head of the family info
        $this->head_family()->create($data['head_family']);

        // wife info
        $this->wife()->create($data['wife']);

        // family members
        $this->family_members()->createMany($data['family_members']);

    }

    ### END MATHOD ###



    ### START SCOPES ###

    // public function scopeWhereExist($query, $column, $value = null){
    //     if (is_array($column)) foreach ($column as $value) $query->whereExist($value[0], $value[1]);
    //     elseif ($value) {
    //         $column = explode('.', $column);
    //         if (isset($column[1])) $query->whereRelation($column[0], $column[1], $value);
    //         else $query->where($column[0], $value);
    //     }
    // }

    ### END SCOPES ###

    ### START ACCESSORS ###

    protected function getX(): Attribute {
        dd('getX');
        return Attribute::make(
            get: function () {
                return $this->head_family->name;
            },
        );
    }

    ### END ACCESSORS ###


}
