<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InboundShipmentDetails extends Model
{
    use HasFactory;

    protected $table = 'inbound_shipment_details';
    protected $fillable = [
        'product_id',
        'inbound_shipment_id',
        'quantity',
        'unitPrice',
        'totalPrice',
    ];

    public function inboundShipment(): BelongsTo
    {
        return $this->belongsTo(InboundShipment::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
