<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Customer;
use App\Models\InboundShipment;
use App\Models\InboundShipmentDetails;
use App\Models\OutboundShipment;
use App\Models\OutboundShipmentDetails;
use App\Models\Product;
use App\Models\Shelf;
use App\Models\Stock;
use App\Models\Supplier;
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
    public $countTable = [];
    public $sumQuantityTable = [];
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
        $this->customers = Customer::select('*')->orderBy('id', 'desc')->limit(8)->get();

        $this->countTable = [
            'products' => $this->dem(Product::all()),
            'customers' => $this->dem(Customer::all()),
            'outbound' => $this->dem(OutboundShipment::all()),
            'inbound' => $this->dem(InboundShipment::all()),
            'shelf' => $this->dem(Shelf::all()),
            'supplier' => $this->dem(Supplier::all()),
            'category' => $this->dem(Category::all()),
        ];

        $this->sumQuantityTable = [
            'stock' => $this->sumQuantity(Stock::all()),
            'outbound' => $this->sumQuantity(OutboundShipmentDetails::all()),
            'inbound' => $this->sumQuantity(InboundShipmentDetails::all()),
        ];

    }

    public function render()
    {
        return view('livewire.dashboard');
    }


    public function dem($table)
    {
        $query = $table->count('id');
        return $query;
    }

    public function sumQuantity($table)
    {
        $query = $table->sum('quantity');
        return $query;
    }
}
