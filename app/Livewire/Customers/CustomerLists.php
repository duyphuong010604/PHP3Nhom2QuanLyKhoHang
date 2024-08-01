<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerLists extends Component
{
    use WithPagination;
    public $customers;

    public $q;
    public $orderBy = 'id';
    public $sortBy = 'desc';

    public function updatedQ()
    {
        $this->q = trim($this->q);
        $this->applyFilter();
    }

    public function updatedOrderBy()
    {
        $this->orderBy = trim($this->orderBy);
        $this->applyFilter();
    }

    public function updatedSortBy()
    {
        $this->sortBy = trim($this->sortBy);
        $this->applyFilter();
    }

    public function mount()
    {
        $this->applyFilter();
        $this->customers = Customer::all();

    }

    public function applyFilter()
    {
        $query = Customer::query();

        if (!empty($this->q)) {
            $query->where(function ($query) {
                $query->where('name', 'like', "%" . $this->q . "%")
                      ->orWhere('email', 'like', "%" . $this->q . "%")
                      ->orWhere('phone', 'like', "%" . $this->q . "%")
                      ->orWhere('address', 'like', "%" . $this->q . "%")
                      ->orWhere('object', 'like', "%" . $this->q . "%");
            });
        }

        $this->customers = $query->orderBy($this->orderBy, $this->sortBy)->paginate(10); // 10 là số lượng bản ghi mỗi trang, có thể điều chỉnh
    }

    public function delete($customerId)
    {
        // Tìm và xóa khách hàng bằng ID
        Customer::find($customerId)->delete();

        // Cập nhật lại danh sách khách hàng sau khi xóa
        $this->customers = Customer::all();

        // Tùy chọn: Thêm flash message hoặc các logic khác
        session()->flash('message', 'Đã xóa khách hàng thành công');
    }
    public function render()
    {

        return view('livewire.customers.customer-lists', [
            'customers' => $this->customers
        ]);
    }
}
