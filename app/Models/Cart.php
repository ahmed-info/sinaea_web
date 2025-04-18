<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarages = [];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
