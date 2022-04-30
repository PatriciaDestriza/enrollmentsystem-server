<?php

namespace App\Repositories\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function createUser($data)
    {
        $user = new User();
        try {
            $user->accountType = $data['accountType'];
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
            return response([
                'message' => 'Successfully created user account.',
                'user' => $user
            ], 200);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }

    public function createToken($tokenType, $accountType)
    {
        if ($accountType == 'admin') {

            echo 'creating admin';
            return Auth::user()->createToken('authToken', ['admin']);
        }
        if ($accountType == 'student') {
            echo 'creating student';
            return Auth::user()->createToken('authToken', ['student']);
        }
    }

    public function login($data)
    {
        try {
            if (!Auth::attempt($data)) {
                return response(['message' => 'Login credentials mismatch.'], 401);
            }
            $accountType = $data['accountType'];
            echo 'account type is' . $accountType;
            $accessToken = $this->createToken('accessToken', $accountType)->accessToken;

            return response([
                'user' => Auth::user(),
                'access_token' => $accessToken
            ]);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }
}
