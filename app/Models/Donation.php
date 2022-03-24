<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'donations';

    protected $fillable = [
        'user_id',
        'fullname',
        'type',
        'amount',
        'items',
        'monetary_img',
        'in_kind_img',
        'feedback',
        'is_approved',
    ];
}
