<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{

    public function createUser($data);
    public function updateUser($id, $data);
    public function getUsers();
    public function login($data);
    public function logout();
}
