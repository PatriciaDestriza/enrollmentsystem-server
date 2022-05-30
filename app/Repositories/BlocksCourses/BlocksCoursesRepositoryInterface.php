<?php

namespace App\Repositories\BlocksCourses;


interface BlocksCoursesRepositoryInterface
{
    public function createBlocksCourses($data);
    public function getAllBlocksCourses();
    public function getSpecificBlocksCourses($id);
    public function deleteBlocksCourses($id);
}
