<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'item_id',
        'quantity',
        'price',
        'order_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }


    protected $appends = ['item'];

    public function getItemAttribute()
    {
        return $this->item()->first();
    }

}
