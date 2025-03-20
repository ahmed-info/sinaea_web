<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'brand_id'
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    

}
