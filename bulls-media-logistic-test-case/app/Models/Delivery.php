<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'package_id', 'address_id', 'delivery_provider'
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function package(): BelongsTo {
        return $this->belongsTo(Package::class);
    }

    function address(): BelongsTo {
        return $this->belongsTo(Address::class);
    }
}
