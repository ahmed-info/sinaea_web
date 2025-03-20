<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalCategoryItem extends Model
{
    protected $fillable = [
        'external_category_id',
        'item_id',
    ];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function externalCategory()
    {
        return $this->belongsTo(ExternalCategory::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
