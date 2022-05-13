<?php

namespace App\Repositories\Student;

interface StudentRepositoryInterface
{

    public function createStudent($data);
    public function editStudent($id);
    public function getStudent();
    public function deleteStudent($id);
}
