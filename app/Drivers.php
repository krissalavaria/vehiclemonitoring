<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $fillable = [
        'driver_name',
        'contact_number',
        'license_number',
        'license_expiration',
        'driver_address',
        'driver_status',
    ];
}
