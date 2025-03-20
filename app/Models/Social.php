<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'facebook',
        'whatsapp',
        'instagram',
        'telegram',
        'youtube',
        'tiktok',
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
