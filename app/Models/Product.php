<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sku',
        'name',
        'price',
        'cost',
        'description',
        'imageUrl',
        'dimensions',
        'weight',
        'status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function outboundShipmentDetails(): HasMany
    {
        return $this->hasMany(OutboundShipmentDetails::class);
    }

    public function inboundShipmentDetails(): HasMany
    {
        return $this->hasMany(InboundShipmentDetails::class);
    }
}
