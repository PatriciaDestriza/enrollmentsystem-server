<?php

namespace App\Repositories\Department;


interface DepartmentRepositoryInterface
{
    public function createDepartment($data);
    public function updateDepartment($id, $data);
    public function getAllDepartments();
    public function deleteDepartment($id);
}
