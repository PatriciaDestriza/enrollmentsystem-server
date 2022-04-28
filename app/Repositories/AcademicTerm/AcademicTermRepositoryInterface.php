<?php

namespace App\Repositories\AcademicTerm;

interface AcademicTermRepositoryInterface
{
    public function createAcademicTerm($data);
    public function updateAcademicTerm($data);
}