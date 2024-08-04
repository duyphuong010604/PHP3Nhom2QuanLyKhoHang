<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\InboundShipment;
use App\Models\OutboundShipment;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class Dashboard extends Component
{
    protected $inbounds;
    public $products;
    public $outbounds;
    public $productOutbounds;
    public $customers;

    public function boot()
    {
        $this->inbounds = InboundShipment::select('id', 'status', 'created_at', 'totalAmount')->orderBy('id', 'desc')->limit(6)->get()->map(function ($item) {
            $item->formatted_created_at = Carbon::parse($item->created_at)->format('d/m/Y');
            return $item;
        });

        $this->outbounds = OutboundShipment::select('id', 'status', 'created_at', 'totalAmount')->orderBy('id', 'desc')->limit(6)->get()->map(function ($item) {
            $item->formatted_created_at = Carbon::parse($item->created_at)->format('d/m/Y');
            return $item;
        });

        $this->products = Product::select('*')->orderBy('id', 'desc')->limit(5)->get();
        $this->customers = Customer::select('*')->orderBy('id', 'desc')->limit(5)->get();
    }

    public function render()
    {

        return view('livewire.dashboard');
    }
}
