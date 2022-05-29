<?php


namespace App\Repositories\Teacher;

use App\Models\Department;
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

    public function updateTeacher($id, $data)
    {

        try {
            $teacher = Teacher::find($id);

            if (is_null($teacher)) {
                throw new Exception('Teacher not found. Cannot update');
            }

            $teacher->firstName = $data['firstName'] ?? $teacher->firstName;
            $teacher->middleName = $data['middleName'] ?? $teacher->middleName;
            $teacher->lastName = $data['lastName'] ?? $teacher->lastName;
            $dept = Department::find($data['departmentID']);

            if (is_null($dept)) {
                throw new Exception('Department not found. Cannot add');
            }
            $teacher->departmentID = $data['departmentID'] ?? $teacher->departmentID;
            $teacher->save();
            return response(['message' => 'Teacher created successfully.'], 200);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function getAllTeachers()
    {
        try {
            return Teacher::with('department', 'courses_taught')->get();
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function getSpecificTeacher($id)
    {
    }

    public function deleteTeacher($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        echo 'done';
    }
}
