<?php

namespace App\Repositories\AcademicYear;

use App\Models\AcademicYear;
use Exception;

class AcademicYearRepository implements AcademicYearRepositoryInterface
{
    public function createAcademicYear($data)
    {
        $acadYear = new AcademicYear;

        try {
            $acadYear->startYear = $data['startYear'];
            $acadYear->endYear = $data['endYear'];
            $acadYear->save();
            return response(['message' => 'Academic Year successfuly saved.']);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function updateAcademicYear($data)
    {
    }
}
