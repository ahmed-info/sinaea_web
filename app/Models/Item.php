<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    protected $fillable = [
        'name',
        'image',
        'brand_id',
        'category_id',
        'cost_price',
        'user_price',
        'supplier_price',
        'isDollar',
        'discount', // percentage
        'active',
        'available',
        'dollar_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function externalCategoryItems()
    {
        return $this->hasMany(ExternalCategoryItem::class, 'item_id');
    }

    public function records()
    {
        return $this->hasMany(Record::class, 'item_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'item_id');
    }


    public function itemDetails()
    {
        return $this->hasMany(ItemDetail::class, 'item_id');
    }

    public function dollar()
    {
        return $this->belongsTo(Dollar::class, 'dollar_id');
    }
    public function ranks()
    {
        return $this->hasMany(Rank::class, 'item_id');
    }

    protected $appends = ['dollar_value','item_details','is_favorite','category_name','brand'];

    public function getCategoryNameAttribute()
    {
        return $this->category()->first()->name;
    }

    public function getBrandAttribute()
    {
        return $this->brand()->first();
    }



    public function getIsFavoriteAttribute()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }

    public function getItemDetailsAttribute()
    {
        return $this->itemDetails()->get();
    }

    public function getDollarValueAttribute()
    {
        return $this->dollar->value;
    }

    public function getExchangePriceAttribute()
    {
        // اذا كان المستخدم مورد وسجل دخوله
        if(Auth::check() && Auth::user()->isSupplier == 1) {

            return ($this->isDollar ==0 || $this->isDollar == null) ? $this->supplier_price : $this->supplier_price * $this->dollar->value;
        }
        return ($this->isDollar ==0 || $this->isDollar == null) ? $this->user_price : $this->user_price * $this->dollar->value;


    }

    public function getDiscountedPriceAttribute()
    {
        if($this->discount == 0 || $this->discount == null) {
            return $this->exchange_price;
        }
        return $this->exchange_price - ($this->exchange_price * $this->discount / 100);
    }
}
