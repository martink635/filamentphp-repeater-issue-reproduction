<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
