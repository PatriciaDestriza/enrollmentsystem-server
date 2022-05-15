<?php

namespace App\Repositories\Program;


interface ProgramRepositoryInterface
{
    public function createProgram($data);
    public function editProgram($id);
    public function getPrograms();
    public function deleteProgram($id);
}
