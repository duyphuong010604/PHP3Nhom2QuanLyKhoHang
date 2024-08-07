<?php
namespace App\Livewire\InboundShipments;

use Livewire\Component;
use App\Models\InboundShipment;
use App\Models\InboundShipmentDetails;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Shelf;


class InboundShipmentDetail extends Component
{
    public $inboundShipment;
    public $inboundShipmentDetails;

    public function mount($id)
    {
        // Lấy thông tin chi tiết của Inbound Shipment từ ID
        $this->inboundShipment = InboundShipment::with(['supplier', 'shelf', 'user'])->findOrFail($id);

        // Lấy thông tin chi tiết của các sản phẩm trong Inbound Shipment
        $this->inboundShipmentDetails = InboundShipmentDetails::with('product')->where('inbound_shipment_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.inbound-shipments.inbound-shipment-detail');
    }
}
