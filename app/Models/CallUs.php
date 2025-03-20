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

    public function getPhoneWithCountryCodeAttribute(){
    // الرقم المكون من 11 مرتبة
    $number = $this->phone;

    // إهمال أول مرتبة
    $remaining = substr($number, 1);

    // إضافة "+964" في البداية
    $finalNumber = "+964" . $remaining;
    return $this->phone = $finalNumber;
    }
}
