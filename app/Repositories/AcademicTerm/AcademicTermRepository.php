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
    public function deleteAcademicTerm($id)
    {
        try {
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
    public function getAllAcademicTerms()
    {
        try {
            $terms = AcademicTerm::all();
            return response($terms, 200);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
}
