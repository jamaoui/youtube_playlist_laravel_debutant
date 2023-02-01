<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates =['created_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];
    public function getImageAttribute($value) {

        return $value??'profile/profile.png';
    }

    public function publications(){
        return $this->hasMany(Publication::class);  
    }
}
