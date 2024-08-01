<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Contracts\View\View;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
class CustomerCreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Validate('required', message: 'Vui lòng nhập tên khách hàng.')]


    public $name = '';

    public $email = '';
    public $phone = '';
    public $address = '';
    public $object = '';

    public function render(): View
    {
        return view('livewire.customers.customer-create');
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\+?[0-9]{7,15}$/',
            'address' => 'required|min:10',
            // 'object' => 'required',
        ];
    }

    public function create()
    {
        $validated = $this->validate();

        $customer = Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'object' => $this->object,
        ]);

        if ($customer) {
            $this->alert('success', 'Thêm khách hàng mới thành công!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->reset([
                'name',
                'email',
                'phone',
                'address',
                'object',
            ]);
        }
    }
}

