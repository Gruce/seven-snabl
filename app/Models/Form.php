<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\PersonalInfo;
class Form extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function head_family(){
        return $this->hasOne(HeadOfTheFamilyInfo::class);
    }

    public function wife(){
        return $this->hasOne(WifeInfo::class);
    }

    ### END RELATIONS ###

    ### START MATHOD ###

    public function add($data){
        // Personal Info
        $this->person = new PersonalInfo($data['person']);

        // 

        return $this;

        // $this->fill($data);
        // $this->save();

        // لا تمسحها
        // $form = Form::create([
        //     'user_id' => auth()->id(),
        //     'city_id' => $data['city_id'],
        // ]);

        // $head_family = new HeadOfTheFamilyInfo();
        // $head_family->name = $data['head_name'];
        // $head_family->is_mr = $data['is_mr'];
        // $head_family->job = $data['job'];
        // $head_family->salary = $data['head_salary'];
        // $form->head_family()->save($head_family);



    }



    ### END MATHOD ###





    
}
