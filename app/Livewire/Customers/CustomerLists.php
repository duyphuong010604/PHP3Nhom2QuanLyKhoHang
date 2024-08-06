<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerLists extends Component
{
    use WithPagination;

    public $q= null;
    public $orderBy = 'id';
    public $sortBy = 'desc';
    public $filterType = 'all';
    public $objectType = 'all';
    public $object = 'all';


    protected $customers;

    public function updatedQ()
    {

        $this->q = trim($this->q);


    }

    public function loadCustomers(){
        $query = Customer::query();
        if ($this->q == null) {

            $query
            ->orderBy('id', 'desc');



        } else {

            $query
                ->where('name', 'like', "%" . $this->q . "%")
                // ->orWhere('email', 'like', "%" . $this->q . "%")
                ->orderBy('id', 'desc');
        }
        return $query->paginate(5);
    }

    public function updatedOrderBy()
    {
        $this->orderBy = trim($this->orderBy);
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->sortBy = trim($this->sortBy);
        $this->resetPage();
    }

    public function updatedObjectType()
    {

        $this->resetPage();
    }

    public function updatedFilterType()
    {
        $this->resetPage();
    }

    public function boot()
    {

        $this->customers = $this->loadCustomers();
    }

    public function applyFilter()
    {

        $query = Customer::query();
        if ($this->object != 'all') {
            $query->where('object', $this->object);
        }

        $this->customers = $query->orderBy($this->orderBy, $this->sortBy)->paginate(5);
    }

    public function delete($customerId)
    {
        Customer::find($customerId)->delete();
        $this->resetPage();
        //session()->flash('message', 'Đã xóa khách hàng thành công');
    }

    public function render()
    {




        return view('livewire.customers.customer-lists');
    }
}

