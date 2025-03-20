<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalCategory extends Model
{
    protected $fillable = [
        'name',
        'image',
        'discount',
    ];

    public function externalCategoryItems()
    {
        return $this->hasMany(ExternalCategoryItem::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];





}

