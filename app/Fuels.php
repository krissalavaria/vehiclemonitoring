<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuels extends Model
{
    protected $fillable = [
        'vehicle_registration_number',
        'date',
        'odometer',
        'fuel_type',
        'reference_number',
    ];
}
