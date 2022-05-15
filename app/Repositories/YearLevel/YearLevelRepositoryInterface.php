<?php

namespace App\Repositories\YearLevel;

interface YearLevelRepositoryInterface {
    public function createYearLevel($data);
    public function updateYearLevel($data);
    public function getAllYearLevels();
    public function deleteYearLevel($id);
}