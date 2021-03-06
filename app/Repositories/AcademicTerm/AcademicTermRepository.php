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

            $termExists = AcademicTerm::where('academicYearId', '=', $data['academicYearId'])
                ->where('semName', '=', $data['semName'])->first();

            if (!is_null($termExists)) {
                throw new Exception('Academic Term already exists.');
            }

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

    public function getAllAcademicTerms()
    {
        try {
            return AcademicTerm::with('academicYear')->get();
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }
    public function deleteAcademicTerm($id)
    {
        try {
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
