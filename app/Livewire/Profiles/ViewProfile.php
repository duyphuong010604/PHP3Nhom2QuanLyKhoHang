<?php

namespace App\Livewire\Profiles;

use App\Repositories\Profiles\ProfilesRepository;
use Livewire\Component;

class ViewProfile extends Component
{

    public $id;
    public $profiles;
    protected $profileRepository;

    public function mount(ProfilesRepository $profilesRepository, $id){
        $this->profileRepository = $profilesRepository;
        $this->id = $id;
        $this->profiles = $this->profileRepository->getProfile($id);
        // dd($this->profiles);
    }


    public function render()
    {
        return view('livewire.profiles.show');
    }
}
