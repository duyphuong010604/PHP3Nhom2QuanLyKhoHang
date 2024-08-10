<?php

namespace App\Repositories\Profiles;

use App\Models\User;

class ProfilesRepository {
    


    public function getProfile($id){
        return User::findOrFail($id);
    }
}