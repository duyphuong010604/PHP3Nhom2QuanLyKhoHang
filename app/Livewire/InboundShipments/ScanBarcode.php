<?php
namespace App\Livewire\InboundShipments;

use Livewire\Component;
use App\Models\Product; // Giả sử bạn đã có model Barcode

class ScanBarcode extends Component
{
    public $barcode;
    public $result;
    public $allProducts;

    public function updatedBarcode($value)
    {


        // dd($value);
        // Xử lý chuỗi barcode, ví dụ tìm kiếm trong database
        $this->result = Product::where('sku', $value)->first();
        
    }
    public function mount(){
$this->allProducts = Product::all();
    }

    public function render()
    {
        return view('livewire.inbound-shipments.scan-barcode',['result' => $this->barcode,
    'collection'=>$this->allProducts]);

    }
}
