<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rehome extends Model
{
    protected $fillable = [
        'user_id',
        'rehome_pet_id',
        'meet_up_date',
        'meet_up_time',
        'status',
    ];

    // Relationships

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rehomePet(): BelongsTo
    {
        return $this->belongsTo(RehomePet::class);
    }
}
