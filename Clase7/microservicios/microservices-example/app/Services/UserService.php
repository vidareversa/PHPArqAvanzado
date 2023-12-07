<?php

namespace App\Services;

class UserService
{
    public function getUsers()
    {
        return ['users' => ['John', 'Jane']];
    }
}