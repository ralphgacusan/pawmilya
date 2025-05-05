<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAppointment extends Model
{
    protected $fillable = [
        'service_id',
        'user_id',
        'pet_name',
        'pet_type',
        'pet_breed',
        'pet_weight',
        'pet_age',
        'date',
        'time',
    ];
}
