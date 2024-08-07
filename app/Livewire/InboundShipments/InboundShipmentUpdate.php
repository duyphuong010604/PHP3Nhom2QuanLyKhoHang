<?php

namespace App\Livewire\InboundShipments;

use Livewire\Component;
use App\Repositories\Interfaces\InboundShipmentRepositoryInterface;

class InboundShipmentUpdate extends Component
{


    public function mount(){

        
    }
    public function render()
    {
        return view('livewire.inbound-shipments.inbound-shipment-update');
    }
}
