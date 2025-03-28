<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallUs extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'open_time',
        'close_time',
        'latitude',
        'longitude'
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // public function getPhoneLocalAttribute()
    // {
    //     return $this->phone;
    // }

    public function getPhoneWithCountryCodeAttribute(){
        if (substr($this->phone, 0, 1) === '0') {
            return '+964' . substr($this->phone, 1);
        }
        return $this->phone;
    }
}
