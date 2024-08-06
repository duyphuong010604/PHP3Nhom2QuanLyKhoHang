<?php

namespace App\Livewire\Customers;

use Livewire\WithFileUploads;
use Illuminate\Contracts\View\View;
use App\Models\Customer;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CustomerUpdate extends Component
{
    use LivewireAlert;

    #[Validate('required', message: 'Vui lòng nhập tên khách hàng.')]
    #[Validate('min:3', message: 'Vui lòng nhập hơn 3 kí tự.')]
    public $name = '';

    #[Validate('required', message: 'Vui lòng nhập email.')]
    #[Validate('email', message: 'Vui lòng nhập đúng định dạng email.')]
    public $email = '';

    #[Validate('required', message: 'Vui lòng nhập số điện thoại.')]
    #[Validate('regex:/^\d{10,11}$/', message: 'Vui lòng nhập đúng định dạng số điện thoại.')]
    public $phone = '';

    #[Validate('required', message: 'Vui lòng nhập địa chỉ.')]
    #[Validate('min:3', message: 'Vui lòng nhập hơn 3 kí tự.')]
    public $address = '';

    public $object = '';

    public $customer;

    public function mount($id)
    {
        $this->customer = Customer::findOrFail($id);
        $this->name = $this->customer->name;
        $this->email = $this->customer->email;
        $this->phone = $this->customer->phone;
        $this->address = $this->customer->address;
        $this->object = $this->customer->object;
    }

    public function render()
    {
        return view('livewire.customers.customer-update');
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\d{10,11}$/',
            'address' => 'required|min:3',
        ];
    }

    public function update()
    {
        $validated = $this->validate();

        $this->customer->update([
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address,
            "object" => $this->object
        ]);

        $this->alert('success', 'Cập nhật thông tin khách hàng thành công.', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
}
