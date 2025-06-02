<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RehomePet extends Model
{
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

    // Relationship

    public function rehomes(): HasMany
    {
        return $this->hasMany(Rehome::class);
    }
}
