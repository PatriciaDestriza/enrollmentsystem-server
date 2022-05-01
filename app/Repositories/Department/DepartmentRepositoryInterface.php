<?php

namespace App\Repositories\Department;


interface DepartmentRepositoryInterface
{
    public function createDepartment($data);
    public function updateDepartment($data);
    public function getAllDepartments($data);
    public function deleteDepartment($data);
}
