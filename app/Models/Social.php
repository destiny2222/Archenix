<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'email',
        'phone',
        'address',
        'address_2',
        'address_3'
    ];
}
