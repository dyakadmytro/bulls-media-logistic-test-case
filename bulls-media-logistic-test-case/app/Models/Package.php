<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'width', 'height', 'length', 'weight', 'width_unit_id', 'height_unit_id', 'length_unit_id', 'weight_unit_id', 'type', 'description'
    ];
}
