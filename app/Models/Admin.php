<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin  extends Authenticatable

{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'password',
        'active'
            ];
    protected $hidden = ['password'];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
