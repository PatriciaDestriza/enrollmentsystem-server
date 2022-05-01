<?php


namespace App\Repositories\Teacher;

use App\Models\Teacher;
use Exception;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function createTeacher($data)
    {
        $teacher = new Teacher();

        try {
            $teacher->firstName = $data['firstName'];
            $teacher->middleName = $data['middleName'];
            $teacher->lastName = $data['lastName'];
            $teacher->departmentID = $data['departmentID'];
            $teacher->save();
            return response(['message' => 'Teacher created successfully.'], 200);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function updateTeacher($data)
    {
    }

    public function getAllTeachers()
    {
        try {
            return Teacher::with('department')->get();
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 401);
        }
    }

    public function getSpecificTeacher($id)
    {
    }

    public function deleteTeacher($id)
    {
    }
}
