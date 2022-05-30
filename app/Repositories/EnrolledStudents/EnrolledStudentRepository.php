<?php

namespace App\Repositories\EnrolledStudents;

use App\Models\AcademicTerm;
use App\Models\Block;
use App\Models\EnrolledStudent;
use App\Models\Student;
use App\Models\YearLevel;
use Exception;

class EnrolledStudentRepository implements EnrolledStudentRepositoryInterface
{
    public function createEnrolledStudent($data)
    {
        try {


            $studentExists = Student::find($data['studentID']);
            if (!is_null($studentExists)) {
                throw new Exception('Student does not Exist. Cannot enroll');
            }

            $termExists = AcademicTerm::find($data['termID']);
            if (!is_null($termExists)) {
                throw new Exception('Academic Term does not Exist. Cannot enroll');
            }

            $yrLvlExists = YearLevel::find($data['yearLevelID']);
            if (!is_null($yrLvlExists)) {
                throw new Exception('Year level does not Exist. Cannot enroll');
            }

            $blockExists = Block::find($data['blockID']);
            if (!is_null($blockExists)) {
                throw new Exception('Block does not Exist. Cannot enroll');
            }

            $enrollee = new EnrolledStudent();
            $enrollee->studentID = $data['studentID'];
            $enrollee->termID = $data['termID'];
            $enrollee->yearLevelID = $data['yearLevelID'];
            $enrollee->blockID = $data['blockID'];
            $enrollee->save();
            return response([
                'message' => 'Student enrolled successfully'
            ]);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ]);
        }
    }
    public function getEnrolledStudents()
    {
        try {
            return EnrolledStudent::with('term', 'student', 'yearLevel', 'block')->get();
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ]);
        }
    }
    public function deleteEnrolledStudents($id)
    {
        try {
        } catch (Exception $error) {
        }
    }
    public function editEnrolledStudent($id)
    {
        //TODO: CREATE
        try {
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
}
