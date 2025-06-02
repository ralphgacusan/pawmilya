<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{

    protected $primaryKey = 'service_id'; // Tells Laravel to use 'service_id' instead of 'id'
    public $incrementing = true;
    protected $keyType = 'int';

    use HasFactory;
    protected $fillable = [
        'name',
        'schedule',
        'duration',
        'description',
        'price',
        'image',
    ];
}
