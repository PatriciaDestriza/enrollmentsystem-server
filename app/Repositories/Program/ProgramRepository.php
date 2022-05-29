<?php


namespace App\Repositories\Program;

use App\Models\Program;
use Exception;

class ProgramRepository implements ProgramRepositoryInterface
{

    public function createProgram($data)
    {
        try {
            $program = new Program();

            $programExists = Program::where('programCode', '=', $data['programCode'])->first();
            if (!is_null($programExists)) {
                throw new Exception('Program already exists. Cannot add new program with same ID.');
            }



            $program->programName = $data['programName'];
            $program->departmentID = $data['departmentID'];
            $program->programCode = $data['programCode'];
            $program->save();
            return response(['message' => 'Program Successfuly Created'], 201);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 401);
        }
    }

    public function updateProgram($data)
    {
        //TODO: CREATE
    }
    public function deleteProgram($id)
    {
        try {
            $prog_exists = Program::find($id);
            if (is_null($prog_exists)) {
                throw new Exception('Program does not exist. Cannot delete.');
            }

            $prog = Program::find($id);
            $prog->programCode = null;
            $prog->delete();
            return response([
                'message' => 'Program with id#' . $id . ' successfully deleted'
            ]);
        } catch (Exception $e) {
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }
    public function getAllPrograms()
    {
        return Program::with('department')->get();
    }
    public function getSpecificProgram($id)
    {
    }
}
