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

    public function head_family(){
        return $this->hasOne(HeadOfTheFamilyInfo::class);
    }

    public function wife(){
        return $this->hasOne(WifeInfo::class);
    }

    ### END RELATIONS ###

    ### START MATHOD ###

    public function add($data){
        $form = Form::create([
            'user_id' => auth()->id(),
            'city_id' => $data['city']['id'],
        ]);

        // Head Family Info

        $head_family = new HeadOfTheFamilyInfo;
        $head_family->name = $data['head_family']['name'];
        $head_family->is_mr = $data['head_family']['is_mr'];
        $head_family->job = $data['head_family']['job'];
        $head_family->salary = $data['head_family']['salary'];
        $head_family->is_alive = $data['head_family']['is_alive'];
        $form->head_family()->save($head_family);

        // Wife Info

        $wife = new WifeInfo;
        $wife->name = $data['wife']['name'];
        $wife->state = $data['wife']['state'];
        $form->wife()->save($wife);

        // Personal Info

        $person = new PersonalInfo;
        $person->level = $data['person']['level'];
        $person->location = $data['person']['location'];
        $person->point = $data['person']['point'];
        $person->location_type = $data['person']['location_type'];
        $person->rent = $data['person']['rent'];
        $person->family_work = $data['person']['family_work'];
        $person->family_count = $data['person']['family_count'];
        $person->have_salary = $data['person']['have_salary'];
        $person->salary = $data['person']['salary'];
        $person->father_phonenumber = $data['person']['father_phonenumber'];
        $person->mother_phonenumber = $data['person']['mother_phonenumber'];
        $form->person()->save($person);

        // Family Members

        foreach ($data['family_members'] as $family_member) {
            $family_member = new FamilyMember;
            $family_member->name = $family_member['name'];
            $form->family_members()->save($family_member);
        }
    }



    ### END MATHOD ###






}
