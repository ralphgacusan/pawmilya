<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pet;

class Adoption extends Model
{
    protected $fillable = [
        'user_id',
        'pet_id',
        'meet_up_date',
        'meet_up_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
