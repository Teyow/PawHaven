<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;
    //use SoftDeletes;

    protected $table = 'pets';

    protected $fillable = [
        'name', 
        'type' ,
        'breed' ,
        'gender' ,
        'stage' ,
        'age',
        'unit',
        'is_adopted',
        'is_visited',
    ];

    public function petProfiles(){
        return $this->hasOne(PetProfile::class, 'pet_id');
    }
}
