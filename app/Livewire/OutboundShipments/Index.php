<?php

namespace App\Livewire\OutboundShipments;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\OutboundShipment;

class Index extends Component 
{
    use WithPagination;
   
    protected $paginationTheme = 'bootstrap'; 
    public $outboundShipments;

    public function mount(){
   
    }

    public function render()
    {
        $paginator = OutboundShipment::paginate(5);

        return view('livewire.outbound-shipments.index', [
            'paginator' => $paginator
        ]);
    }
}
