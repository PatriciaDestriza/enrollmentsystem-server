<?php

namespace App\Repositories\BlocksCourses;

use App\Models\Block;
use App\Models\BlockCourses;
use Exception;

class BlocksCoursesRepository implements BlocksCoursesRepositoryInterface
{
    public function createBlocksCourses($data)
    {
        try {
            $blockID = $data['blockID'];
            $blockExists = Block::find($blockID);
            if (is_null($blockExists)) {
                throw new Exception("Block doesn't exist. Cannot add");
            }

            $courseID = $data['courseID'];
            if (is_null($courseID)) {
                throw new Exception("Course doesn't exist. Cannot add");
            }
            $termID = $data['termID'];
            if (is_null($termID)) {
                throw new Exception("Term doesn't exist. Cannot add");
            }

            $blockCourse = new BlockCourses();
            $blockCourse->blockID = $blockID;
            $blockCourse->courseID = $courseID;
            $blockCourse->termID = $termID;
            $blockCourse->save();
            return response([
                'message' => 'Block Course has been created successfully'
            ]);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function getAllBlocksCourses()
    {
        return BlockCourses::with('block', 'course', 'term')->get();
    }
    public function getSpecificBlocksCourses($id)
    {
    }
    public function deleteBlocksCourses($id)
    {
        try {
            $blockCourse = BlockCourses::find($id);
            if (!is_null($blockCourse)) {
                $blockCourse->delete();
                return response([
                    'message' => 'Block Course has been deleted'
                ], 400);
            }
        } catch (Exception $th) {
            return response([
                'message' => $th->getMessage()
            ]);
        }
    }
}
