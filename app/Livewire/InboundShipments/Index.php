<?php

namespace App\Livewire\InboundShipments;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InboundShipment;
use App\Models\Customer;
use App\Models\Shelf;

class Index extends Component 
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap'; 

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
        $query = InboundShipment::query();

        if ($this->status) {
            $query->where('status', $this->status);
        }
        
        if ($this->customer_id) {
            $query->where('customer_id', $this->customer_id);
        }
        
        if ($this->shelf_id) {
            $query->where('shelf_id', $this->shelf_id);
        }

       

        $paginator = $query->paginate(5);

        // Lấy danh sách khách hàng và kệ
        

        return view('livewire.inbound-shipments.index', [
            'paginator' => $paginator,
           
        ]);
    }
}
