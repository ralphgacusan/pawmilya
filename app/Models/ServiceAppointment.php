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

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function service()
    {
    return $this->belongsTo(Service::class, 'service_id', 'service_id');    }
}
