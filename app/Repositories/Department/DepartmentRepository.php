<?php


namespace App\Repositories\Department;

use App\Models\Department;
use Exception;

class DepartmentRepository implements DepartmentRepositoryInterface
{

    public function createDepartment($data)
    {
        try {
            $department = new Department();

            $deptExists = Department::where('collegeCode', '=', $data['collegeCode'])->first();

            if (!is_null($deptExists)) {
                throw new Exception('Department already exists. Cannot create a new department with the same code.');
            }

            $department->collegeName = $data['collegeName'];
            $department->collegeCode = $data['collegeCode'];
            $department->save();
            return response(['message' => 'Department successfuly created'], 200);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function updateDepartment($data)
    {
    }
    public function getAllDepartments()
    {
        try {

            return Department::all();
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 401);
        }
    }

    public function deleteDepartment($data)
    {
    }
}
