<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',   // ✅ keep this (this is stored in DB)
        'stock',
        'is_active',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // ✅ ADD THIS ACCESSOR HERE
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset($this->image)
            : null;
    }
}