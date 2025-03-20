<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
