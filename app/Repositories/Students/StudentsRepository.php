<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;
use Exception;

class StudentRepository implements StudentRepositoryInterface
{

    private $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createUniversityID()
    {
        $currentYear = strval(Carbon::now()->format('Y'));
        $randomNumber = rand(100000, 999999);
        $stringNum = strval($randomNumber);
        return $universityID = $currentYear . $stringNum;
        //  . $stringNum;
    }

    public function createStudent($data)
    {

        try {

            $universityID = $this->createUniversityID();
            $accountType = 'student';
            $firstName = $data['firstName'];
            $middleName = $data['middleName'];
            $lastName = $data['lastName'];
            $birthDate = $data['birthDate'];
            $phoneNumber = $data['phoneNumber'];
            $currentYear = strval(Carbon::now()->format('y'));
            $username = $data['firstName'] . $data['lastName'] . $currentYear;
            $address = $data['address'];
            $email = $data['email'];
            $length = 10;
            $password = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
            $forStudent = true;

            $data = [
                'accountType' => $accountType,
                'universityID' => $universityID,
                'firstName' => $firstName,
                'middleName' => $middleName,
                'lastName' => $lastName,
                'birthDate' => $birthDate,
                'address' => $address,
                'phoneNumber' => $phoneNumber,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'forStudent' => $forStudent
            ];
            $request = $this->repository->createUser($data);
            return $request;
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function editStudent($id, $data)
    {
        try {
            return $this->repository->updateUser($id, $data);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function getStudent($id)
    {
        try {
            //code...
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }

    public function getAllStudents()
    {
        try {
            return Student::with('user')->get();
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function deleteStudent($id)
    {
        try {
            //code...
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
}
