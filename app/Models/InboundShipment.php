<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InboundShipment extends Model
{
    use HasFactory;
    protected $fillablde = [
        'user_id',
        'supplier_id',
        'shelf_id',
        'totalAmount',
        'remarks',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function shelf(): BelongsTo
    {
        return $this->belongsTo(Shelf::class);
    }

    public function inboundShipmentDetails()
    {
        return $this->hasMany(InboundShipmentDetails::class);
    }


}
