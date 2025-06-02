<?php

namespace App\Models;
use App\Models\User;


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


     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
