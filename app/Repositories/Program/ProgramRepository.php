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
    }
    public function deleteProgram($id)
    {
    }
    public function getAllPrograms()
    {
        return Program::with('department')->get();
    }
    public function getSpecificProgram($id)
namespace App\Repositories\Program;

class ProgramRepository implements ProgramRepositoryInterface
{
    public function createProgram($data)
    {
    }
    public function editProgram($id)
    {
    }
    public function getPrograms()
    {
    }
    public function deleteProgram($id)
    {
    }
}
