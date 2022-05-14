<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiveForme extends Model
{
    use HasFactory;

    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function give_form(){
        return $this->belongsTo(GiveType::class);
    }
}
