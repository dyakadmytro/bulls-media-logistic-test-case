<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function fullAddress(): Attribute
    {
        return Attribute::make(
          get: fn() => implode(' ', [$this->country, $this->state, $this->city, $this->street, $this->house, $this->postal_code])
        );
    }
}
