<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = [
        'registration_number',
        'model_number',
        'plate_number',
        'vehicle_type',
    ];
}
