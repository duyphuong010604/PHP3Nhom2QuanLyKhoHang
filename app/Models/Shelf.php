<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shelf extends Model
{
    use HasFactory;

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function inboundShipments(): HasMany
    {
        return $this->hasMany(InboundShipments::class);
    }

    public function outboundShipments(): HasMany
    {
        return $this->hasMany(OutboundShipment::class);
    }
}
