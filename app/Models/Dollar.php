<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dollar extends Model
{
    protected $fillable = [
        'value',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'dollar_id');
    }
}
