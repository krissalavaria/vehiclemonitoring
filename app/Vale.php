<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'date',
        'address',
        'plate_number',
        'description',
        'quantity',
        'unit_cost',
        'total_amount',
        'receipt_number',
        'form_status',
        'vehicle_description',
    ];
}
