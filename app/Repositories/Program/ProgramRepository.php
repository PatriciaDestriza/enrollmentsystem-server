<?php


namespace App\Repositories\Program;

use App\Models\Department;
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
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function updateProgram($id, $data)
    {
        try {
            $program = Program::find($id);
            if (is_null($program)) {
                throw new Exception('Program does not exist. Cannot edit');
            }

            $deptExists = Department::find($data['departmentID']);
            if (is_null($deptExists)) {
                throw new Exception('Department does not exist. Cannot add');
            }

            $program->programName = $data['programName'];
            $program->departmentID = $data['departmentID'];
            $program->programCode = $data['programCode'];
            $program->save();
            return response(['message' => 'Program Successfuly Updated'], 201);
        } catch (Exception $error) {
            return response(['message' => $error->getMessage()], 400);
        }
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
