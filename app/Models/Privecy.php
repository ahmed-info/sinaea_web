<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privecy extends Model
{
    protected $table = 'privecies';
    protected $fillable = [
        'privacy_policy',
        'terms_and_conditions'
    ];
}
