<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSimple extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
