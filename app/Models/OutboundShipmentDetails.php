<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutboundShipmentDetails extends Model
{
    use HasFactory;
    protected $table = 'outbound_shipmentdetails';


    public function outboundShipment(): BelongsTo
    {
        return $this->belongsTo(OutboundShipment::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
