<?php

namespace App\Repositories\Teacher;


interface TeacherRepositoryInterface
{
    public function createTeacher($data);
    public function updateTeacher($data);
    public function getAllTeachers();
    public function getSpecificTeacher($id);
    public function deleteTeacher($id);
}
