<?php

namespace App\Repositories\Program;


interface ProgramRepositoryInterface
{
    public function createCourse($data);
    public function editCourse($id);
    public function getCourses();
    public function deleteCourse($id);
}
