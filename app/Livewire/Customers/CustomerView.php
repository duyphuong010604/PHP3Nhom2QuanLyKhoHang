<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;

class CustomerView extends Component
{
    public $customer;

    public function mount($id)
    {

        $this->customer = Customer::findOrFail($id);
    }
    public function render()
    {

        return view('livewire.customers.customer-view');
    }
}
