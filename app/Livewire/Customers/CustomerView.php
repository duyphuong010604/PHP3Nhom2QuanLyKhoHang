<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;

class CustomerView extends Component
{
    public $customer;
    public $orders;

    public function mount($id)
    {
        $this->customer = Customer::findOrFail($id);
        $this->orders = $this->customer->orders; // Lấy lịch sử đơn hàng
    }

    public function render()
    {
        return view('livewire.customers.customer-view', [
            'customer' => $this->customer,
            'orders' => $this->orders
        ]);
    }
}
