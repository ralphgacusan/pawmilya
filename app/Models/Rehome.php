<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rehome extends Model
{
     // Define the fillable attributes
     protected $fillable = [
        'user_id',
        'rehome_pet_id',
        'meet_up_date',
        'meet_up_time',
    ];
}
