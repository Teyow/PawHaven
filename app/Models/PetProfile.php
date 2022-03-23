<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'pet_id',
        'size',
        'color', 
        'personality',
        'healthInfo' ,
        'about', 
        'pet_image', 
    ];

    public function pet(){
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
