<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'user_id', 'country', 'state', 'city', 'street', 'house', 'postal_code'
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
