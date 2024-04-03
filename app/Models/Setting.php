<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'analysis_trackingid',
        'google_analytics',
        'metatag_des',
        'metatag_keyword'
    ];
}
