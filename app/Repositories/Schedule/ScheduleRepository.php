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
                ->where('endTime', '=', $data['endTime'])->first();


            if (!is_null($sameSchedule)) {
                throw new Exception('Schedule already created. Cannot create a new schedule with same day, start and end times.');
            }

            $sched = new Schedule();
            $sched->day = $data['day'];
            $sched->startTime = $data['startTime'];
            $sched->endTime = $data['endTime'];
            $sched->save();
            return response([
                'message' => 'Schedule saved successfuly'
            ], 200);
        } catch (Exception $err) {
            return response([
                'message' => $err->getMessage()
            ], 400);
        }
    }
    public function editSchedule($id, $data)
    {
        try {
            $schedule = Schedule::find($id);
            if (is_null($schedule)) {
                throw new Exception('Schedule does not exist. Cannot edit');
            }


            $schedule->day = $data['updateDay'];
            $schedule->startTime = $data['startTime'];
            $schedule->endTime = $data['endTime'];
            $schedule->save();
            return response([
                'message' => 'Schedule saved successfuly'
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
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
        try {
            $sched = Schedule::find($id);
            if (is_null($sched)) {
                throw new Exception('Schedule does not exist. Cannot delete');
            }

        $sched->courses
            $sched->delete();

            return response([
                'message' => ' Schedule deleted'
            ]);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
}
