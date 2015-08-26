<?php

namespace App\Services;

use App\User;

class UserService
{

    public function getName($id)
    {
        return User::where('id', $id)->pluck('name');
    }

    public function getEmail($id)
    {
        return User::where('id', $id)->pluck('email');
    }

    public function getUsername($id)
    {
        return User::where('id', $id)->pluck('username');
    }
}
