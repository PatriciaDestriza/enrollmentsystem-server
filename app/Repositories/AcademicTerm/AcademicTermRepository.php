<?php


namespace App\Repositories\AcademicTerm;

use App\Models\AcademicTerm;
use Exception;


class AcademicTermRepository implements AcademicTermRepositoryInterface
{
    public function createAcademicTerm($data)
    {
        try {
            $acadTerm = new AcademicTerm;

            $acadTerm->semName = $data['semName'];
            $acadTerm->academicYearID = $data['academicYearId'];
            $acadTerm->save();
            return response(['message' => 'Successfully created academic term.']);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function updateAcademicTerm($data)
    {
    }
}
