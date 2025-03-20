<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function slides()
    {
        return $this->hasMany(Slide::class, 'brand_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'brand_id');
    }
}
