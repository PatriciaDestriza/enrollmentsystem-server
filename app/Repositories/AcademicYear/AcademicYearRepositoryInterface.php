<?php

namespace App\Repositories\AcademicYear;

interface AcademicYearRepositoryInterface
{
    public function createAcademicYear($data);
    public function updateAcademicYear($data);
    public function deleteAcademicYear($id);
}
