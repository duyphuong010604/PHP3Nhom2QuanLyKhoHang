<?php

namespace App\Livewire\OutboundShipments;

use Livewire\Component;
use App\Models\OutboundShipment;
use App\Models\OutboundShipmentDetails;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Shelf;
class OutboundShipmentDetail extends Component
{
    public $OutboundShipment;
    public $OutboundShipmentDetails;

    public function mount($id)
    {
        // Lấy thông tin chi tiết của Inbound Shipment từ ID
        $this->OutboundShipment = OutboundShipment::with(['customer', 'shelf', 'user'])->findOrFail($id);

        // Lấy thông tin chi tiết của các sản phẩm trong Inbound Shipment
        $this->OutboundShipmentDetails = OutboundShipmentDetails::with('product')->where('outbound_shipment_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.outbound-shipments.outbound-shipment-detail');
    }
}
