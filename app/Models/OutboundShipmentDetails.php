<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutboundShipmentDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'product_id',        // Thêm thuộc tính này
        'outbound_shipment_id', // Thêm thuộc tính này
        'quantity',          // Thêm thuộc tính này
        'unitPrice',         // Thêm thuộc tính này
        'totalPrice',        // Thêm thuộc tính này
        'created_at',
        'updated_at',
    ];

    public function outboundShipment(): BelongsTo
    {
        return $this->belongsTo(OutboundShipment::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
