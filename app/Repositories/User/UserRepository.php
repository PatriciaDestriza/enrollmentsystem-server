<?php

namespace App\Repositories\User;

use App\Models\Student;
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
            $username = $data['username'];
            $usernamExists = User::where('username', '=', $username)->first();
            if (!is_null($usernamExists)) {
                throw new Exception('Username already Exist');
            }
            $universityID = $data['universityID'];
            $idExists = User::where('universityID', '=', $universityID)->first();
            if (!is_null($idExists)) {
                throw new Exception('ID already Exists');
            }

            $email = $data['email'];
            $emailExists = User::where('email', '=', $email)->first();
            if (!is_null($emailExists)) {
                throw new Exception('Email already exists');
            }

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
            try {


                if ($data['forStudent'] === true) {
                    $student = new Student();
                    $student->userID = $user->id;
                    $student->isActivated = false;
                    $student->save();
                }
            } catch (Exception $e) {
            }
            return response([
                'message' => 'Successfully created user account.',
                'user' => $user
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function createToken($tokenType, $accountType)
    {
        if ($accountType == 'admin') {

            return Auth::user()->createToken('authToken');
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
