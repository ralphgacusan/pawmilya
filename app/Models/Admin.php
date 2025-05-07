<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'first_name',   // Add first_name
        'last_name',    
        'email',
        'password',
        'mobile_number',
        'position',
        'description',
// Add last_name
    ];

    protected $hidden = [
        'password',
    ];
}
