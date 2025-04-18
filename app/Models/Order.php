<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'status',
        'notes',
        'completed',
        'canceled',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(Record::class, 'order_id');
    }
    public function records()
    {
        return $this->hasMany(Record::class,'order_id');
    }

    protected $appends = ['total_price'];

    public function getTotalPriceAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    }


}
