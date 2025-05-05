<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'beneficiary',
        'donation_type',
        'donation_method',
    ];
}
