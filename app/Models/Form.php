<?php

namespace App\Models;

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
        return $this->hasMany(GiveForme::class);
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
        $this->person()->create($data['personal_info']);

        // head of the family info
        $this->head_family()->create($data['head_family']);

        // wife info
        $this->wife()->create($data['wife_info']);

        // family members
        $this->family_members()->createMany($data['family_members']);

    }



    ### END MATHOD ###






}
