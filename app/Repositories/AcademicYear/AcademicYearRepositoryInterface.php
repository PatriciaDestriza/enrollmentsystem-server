<?php

namespace App\Repositories\AcademicYear;

interface AcademicYearRepositoryInterface
{
    public function createAcademicYear($data);
    public function getAllAcademicYears();
    public function updateAcademicYear($data);
    public function deleteAcademicYear($id);
}
