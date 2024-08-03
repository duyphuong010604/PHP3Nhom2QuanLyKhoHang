<?php

namespace App\Livewire\Profiles;

use App\Repositories\Profiles\ProfilesRepository;
use Livewire\Component;

class ViewProfile extends Component
{

    public $profiles;
    protected $profileRepository;

    public function mount(ProfilesRepository $profilesRepository){
        $this->profileRepository = $profilesRepository;
        $this->profiles = $this->profileRepository->getProfile();
        // dd($this->profiles->fullname);
    }


    public function render()
    {
        return view('livewire.profiles.show');
    }
}
