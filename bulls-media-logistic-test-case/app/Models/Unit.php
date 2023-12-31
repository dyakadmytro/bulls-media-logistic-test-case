<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = ['name', 'type'];
}
