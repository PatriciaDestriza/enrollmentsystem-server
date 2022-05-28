<?php

namespace App\Repositories\Students;

interface StudentRepositoryInterface
{

    public function createStudent($data);
    public function editStudent($id, $data);
    public function getStudent($id);
    public function getAllStudents();
    public function deleteStudent($id);
}
