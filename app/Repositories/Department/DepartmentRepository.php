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

            $department->collegeName = $data['collegeName'];
            $department->collegeCode = $data['collegeCode'];
            $department->save();
            return response(['message' => 'Department successfuly created'], 200);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 401);
        }
    }

    public function updateDepartment($data)
    {
    }
    public function getAllDepartments($data)
    {
    }

    public function deleteDepartment($data)
    {
    }
}
