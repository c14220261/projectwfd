<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'profile_id';

    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    public function currentCar(){
        return $this->hasOne(Cars::class,'current_profile_id');
    }
}
