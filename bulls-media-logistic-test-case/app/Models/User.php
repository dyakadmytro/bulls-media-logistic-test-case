<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * @property-read $packages
 * @property-read $deliveries
 * @property-read $addresses
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @return HasMany
     */
    function packages(): HasMany {
        return $this->hasMany(Package::class);
    }

    /**
     * @return HasMany
     */
    function deliveries(): HasMany {
        return $this->hasMany(Delivery::class);
    }

    /**
     * @return HasMany
     */
    function addresses(): HasMany {
        return $this->hasMany(Address::class);
    }

    /**
     *
     * @return BelongsTo
     */
    function address(): BelongsTo {
        return $this->belongsTo(Address::class);
    }

    protected function fullName(): Attribute {
        return Attribute::make(
            get: fn () => $this->name,
        );
    }
}
