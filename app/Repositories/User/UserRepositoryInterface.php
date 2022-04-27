<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{

    public function createUser($data);
    public function login($data);
}
