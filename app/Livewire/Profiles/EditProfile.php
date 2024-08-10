<?php

namespace App\Livewire\Profiles;

use App\Repositories\Profiles\ProfilesRepository;
use Livewire\Component;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;

class EditProfile extends Component
{

    use LivewireAlert;

    public $id;
    public $profiles;

    public $name = '';

    public $email = '';

    public $address = '';
    protected $profileRepository;


    public function rules()
    {
        return [
            'name' => 'required|max:60',
            'email' => 'required|email|max:255',
            'address' => 'required|min:1|max:255',
        ];
    }

    public function mount(ProfilesRepository $profilesRepository)
    {
        $this->profileRepository = $profilesRepository;
        $this->id = 3;
        $this->profiles = $this->profileRepository->getProfile($this->id);
        if ($this->profiles) {
            $this->name = $this->profiles->fullname;
            $this->email = $this->profiles->email;
            $this->address = $this->profiles->address;
        }
        // dd($this->profiles);
    }

    public function saveProfile()
    {
        $validated = $this->validate();
        DB::enableQueryLog();
        // dd($this->profiles);
        $this->profiles->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
        ]);
        dd(DB::getQueryLog());
        $this->alert('success', 'Cập nhật tài khoản thành công!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }



    public function render()
    {
        return view('livewire.profiles.edit');
    }


    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'name.max' => 'Tên quá dài, tối đa 60 ký tự.',

            'email.required' => 'Vui lòng nhập email.',
            'email.max' => 'Email quá dài, tối đa 255 ký tự.',
            'email.unique' => 'Email này đã tồn tại trong hệ thống.',

            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.min' => 'Địa chỉ quá ngắn, tối thiểu 1 ký tự.',
            'address.max' => 'Địa chỉ quá dài, tối đa 255 ký tự.',
        ];
    }
}
