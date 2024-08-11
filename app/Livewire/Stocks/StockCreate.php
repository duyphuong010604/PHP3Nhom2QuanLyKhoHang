<?php

namespace App\Livewire\Stocks;

use App\Models\Product;
use Livewire\Component;
use App\Models\InboundShipmentDetails;
use Livewire\WithFileUploads;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\InboundShipment;

class StockCreate extends Component
{

    use WithFileUploads;

    public $file;

    protected $rules = [
        'file' => 'required|mimes:xlsx,xls',
    ];

    protected $messages = [
        'file.required' => 'Vui lòng chọn một file để upload.',
        'file.mimes' => 'File phải có định dạng .xlsx hoặc .xls.',
    ];

    public function addStock()
    {
        $this->validate();

        // Load the Excel file
        $path = $this->file->getRealPath();

        $reader = IOFactory::createReaderForFile($path);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($path);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        if (count($sheetData) <= 1) {
            session()->flash('error', 'File không có dữ liệu hoặc dữ liệu không hợp lệ.');
            return;
        }
        // dd($sheetData);
        for ($i = 1; $i < count($sheetData); $i++) {
            $row = $sheetData[$i];
    
            // Tạo mới Inbound Shipment
            $inboundShipment = InboundShipment::create([
                'user_id' => $row[0],      
                'supplier_id' => $row[1],  
                'shelf_id' => $row[2],     
                'totalAmount' => $row[3],    
                'remarks' => $row[4],        
                'status' => $row[5],         
            ]);
    
            InboundShipmentDetails::create([
                'product_id' => $row[6],          
                'inbound_shipment_id' => $inboundShipment->id, 
                'quantity' => $row[7],             
                'unitPrice' => $row[8],            
                'totalPrice' => $row[9],       
            ]);
        }
        // dd($sheetData);

        session()->flash('success', 'Dữ liệu đã được import thành công.');
    }

    public function render()
    {
        return view('livewire.stocks.stock-create');
    }
    

}
