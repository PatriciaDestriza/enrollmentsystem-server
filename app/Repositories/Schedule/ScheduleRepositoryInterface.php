<?php

namespace App\Repositories\Schedule;

interface ScheduleRepositoryInterface
{
    public function createSchedule($data);
    public function editSchedule($id);
    public function getSchedules();
    public function deleteSchedule($id);
}
