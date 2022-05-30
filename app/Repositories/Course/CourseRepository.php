<?php

namespace App\Repositories\Course;

use App\Repositories\Course\CourseRepositoryInterface;


use App\Models\Course;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Teacher;
use Exception;

class CourseRepository implements CourseRepositoryInterface
{
    public function createCourse($data)
    {

        try {
            $course = new Course();
            $teacherExists = Teacher::find($data['teacherID']);
            $roomExists = Room::find($data['roomID']);
            $scheduleExists = Schedule::find($data['scheduleID']);
            $courseIDExists = Course::where('courseCode', '=',  $data['courseCode'])->first();

            if (!is_null($courseIDExists)) {

                throw new Exception('The ID already exists. Cannot add to course');
            }

            if (is_null($teacherExists)) {
                throw new Exception('The teacher does not exist. Cannot add to course');
            }

            if (is_null($roomExists)) {
                throw new Exception('The room does not exist. Cannot add to course');
            }

            if (is_null($scheduleExists)) {
                throw new Exception('The schdule does not exist. Cannot add to course');
            }

            $course->courseName = $data['courseName'];
            $course->courseCode = $data['courseCode'];
            $course->teacherID = $data['teacherID'];
            $course->roomID = $data['roomID'];
            $course->scheduleID = $data['scheduleID'];
            $course->save();
            return response([
                'message' => 'Course successfully created'
            ], 200);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function getCourses()
    {
        try {
            $courses = Course::with(['room', 'schedule', 'teacher'])->get();
            return response($courses, 200);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function editCourse($id, $data)
    {
        try {
            $courseExists = Course::find($id);
            if (is_null($courseExists)) {
                throw new Exception('Course does not exist. Cannot edit');
            }
            $teacherExists = Teacher::find($data['teacherID']);
            $roomExists = Room::find($data['roomID']);
            $scheduleExists = Schedule::find($data['scheduleID']);

            if (is_null($teacherExists)) {
                throw new Exception('The teacher does not exist. Cannot add to course');
            }

            if (is_null($roomExists)) {
                throw new Exception('The room does not exist. Cannot add to course');
            }

            if (is_null($scheduleExists)) {
                throw new Exception('The schdule does not exist. Cannot add to course');
            }

            $courseExists->courseName = $data['courseName'] ?? $courseExists->courseName;
            $courseExists->courseCode = $data['courseCode'] ?? $courseExists->courseCode;
            $courseExists->teacherID = $data['teacherID'] ?? $courseExists->teacherID;
            $courseExists->roomID = $data['roomID'] ?? $courseExists->roomID;
            $courseExists->scheduleID = $data['scheduleID'] ?? $courseExists->scheduleID;
            $courseExists->save();
            return response([
                'message' => 'Course successfully edited'
            ], 200);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function deleteCourse($id)
    {
        try {
            $courseExists = Course::find($id);
            if (is_null($courseExists)) {
                throw new Exception('Course does not exist. Cannot delete');
            }
            $courseExists->courseCode = null;
            $courseExists->save();
            $courseExists->delete();
            return response([
                'message' => 'Course has been deleted'
            ]);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
}
