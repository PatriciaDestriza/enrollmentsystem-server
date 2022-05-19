<?php

namespace App\Repositories\Schedule;

use App\Models\Schedule;
use Exception;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    public function createSchedule($data)
    {
        try {
            $sameSchedule =  Schedule::where('day', '=', $data['day'])
                ->where('startTime', '=', $data['startTime'])
                ->where('endTime', '=', $data['endTime'])->get();

            echo $sameSchedule;

            if (!is_null($sameSchedule)) {
                throw new Exception('Schedule already created');
            }

            $sched = new Schedule();
            $sched->day = $data['day'];
            $sched->startTime = $data['startTime'];
            $sched->endTime = $data['endTime'];
            $sched->save();
            return response([
                'Schedule saved successfuly'
            ], 200);
        } catch (Exception $err) {
            return response([
                'message' => $err->getMessage()
            ]);
        }
    }
    public function editSchedule($id)
    {
    }
    public function getSchedules()
    {
        try {
            $scheds = Schedule::all();
            return response($scheds, 200);
        } catch (Exception $err) {
            return response([
                'message' => $err->getMessage()
            ], 400);
        }
    }
    public function deleteSchedule($id)
    {
    }
}
