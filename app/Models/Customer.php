<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'object'
    ];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function outboundShipments(): HasMany
    {
        return $this->hasMany(OutboundShipment::class);
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
