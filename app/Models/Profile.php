<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Profile extends User implements MustVerifyEmail
{
    use SoftDeletes;

    protected $dates =['created_at','email_verified_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image',
        'email_verified_at'
    ];
    public function getImageAttribute($value) {

        return $value??'profile/profile.png';
    }

    public function publications(){
        return $this->hasMany(Publication::class);  
    }
}
