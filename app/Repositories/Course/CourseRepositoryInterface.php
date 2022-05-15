<?php

namespace App\Repositories\Course;


interface CourseRepositoryInterface
{
    public function createCourse($data);
    public function getCourses();
    public function editCourse($id);
    public function deleteCourse($id);
}
