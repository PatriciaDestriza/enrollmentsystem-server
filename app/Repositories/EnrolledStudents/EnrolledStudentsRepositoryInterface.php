<?php

namespace App\Repositories\EnrolledStudents;


interface  EnrolledStudentRepositoryInterface
{
    public function createEnrolledStudent($data);
    public function getEnrolledStudents();
    public function deleteEnrolledStudents($id);
    public function editEnrolledStudent($id);
}
