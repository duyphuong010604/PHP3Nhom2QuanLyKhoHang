<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'contactEmail',
        'postalCode',
    ];

    public function inboundShipments(): HasMany
    {
        return $this->hasMany(InboundShipment::class);
    }
}
