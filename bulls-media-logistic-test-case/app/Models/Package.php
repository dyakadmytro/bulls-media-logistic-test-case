<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id', 'width', 'height', 'length', 'weight', 'width_unit', 'height_unit', 'length_unit', 'weight_unit', 'type', 'description'
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
