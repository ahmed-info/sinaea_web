<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    protected $fillable = [
        'item_id',
        'description',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
