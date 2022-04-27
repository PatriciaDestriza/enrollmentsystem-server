<?php

namespace App\Repositories\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function createUser($data)
    {
        $user = new User();
        try {

            $user->universityID = $data['universityID'];
            $user->firstName = $data['firstName'];
            $user->middleName = $data['middleName'];
            $user->lastName = $data['lastName'];
            $user->birthDate = $data['birthDate'];
            $user->address = $data['address'];
            $user->phoneNumber = $data['phoneNumber'];
            $user->email = $data['email'];
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->save();
            echo "user created";
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
