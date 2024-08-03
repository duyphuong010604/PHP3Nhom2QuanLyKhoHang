<?php

namespace App\Repositories\Profiles;

use App\Models\User;

class ProfilesRepository {
    


    public function getProfile(){
        return User::get();
    }
}