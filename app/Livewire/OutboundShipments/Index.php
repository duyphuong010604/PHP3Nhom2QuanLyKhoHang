<?php

namespace App\Livewire\OutboundShipments;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;
use App\Models\Shelf;

use App\Models\OutboundShipment;

class Index extends Component 
{
    use WithPagination;
   
    protected $paginationTheme = 'bootstrap'; 
    public $outboundShipments;
    public $status; // Trường lọc theo trạng thái
    public $customer_id; // Trường lọc theo khách hàng
    public $shelf_id; // Trường lọc theo kệ
    public $search; // Trường tìm kiếm
    public  $pagination; 

    public function updated($propertyName)
    {
        // Khi giá trị của bất kỳ thuộc tính nào thay đổi, cập nhật lại trang
        $this->resetPage();
    }

    public function filter()
    {
        $this->resetPage(); // Reset trang hiện tại để áp dụng bộ lọc
    }

    public function mount(){
        $customers = Customer::all();
        $shelves = Shelf::all();
    }

    public function render()
    {
        $query=OutboundShipment::query();
        if ($this->status) {
            $query->where('status', $this->status);
        }
        
        if ($this->customer_id) {
            $query->where('customer_id', $this->customer_id);
        }
        
        if ($this->shelf_id) {
            $query->where('shelf_id', $this->shelf_id);
        }
        $paginator = OutboundShipment::paginate(5);

        return view('livewire.outbound-shipments.index', [
            'paginator' => $paginator
        ]);
    }
}
