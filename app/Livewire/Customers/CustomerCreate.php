<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Contracts\View\View;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
#[Title('Thêm Mới Khách Hàng')]
class CustomerCreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;

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

    #[Validate('required', message: 'Vui lòng chọn đối tượng.')]
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
            'object' => 'required',
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

