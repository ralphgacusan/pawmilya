<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'pets';

    // Define the columns that are mass assignable
    protected $fillable = [
        'name',
        'birth_date',
        'type',
        'breed',
        'gender',
        'height',
        'weight',
        'temperament',
        'good_with',
        'spayed_neutered_status',
        'vaccination_status',
        'existing_conditions',
        'description',
        'status',
        'image',
    ];

    // You can also define the dates for your columns (like `birth_date`)
    protected $dates = ['birth_date'];

    public function adoptions()
{
    return $this->hasMany(Adoption::class);
}
}
