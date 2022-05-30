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

    public function getAllAcademicYears()
    {
        try {
            return AcademicYear::all();
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 401);
        }
    }
    public function deleteAcademicYear($id)
    {
        try {

            AcademicYear::find($id)->delete();
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
    public function getAcademicYears()
    {
        try {
            $years = AcademicYear::all();
            return response($years, 200);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }
}
