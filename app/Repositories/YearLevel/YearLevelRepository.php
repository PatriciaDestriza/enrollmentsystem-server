<?php

namespace App\Repositories\YearLevel;

use App\Models\YearLevel;
use Error;
use Exception;

class YearLevelRepository implements YearLevelRepositoryInterface
{
    public function createYearLevel($data)
    {
        try {
            $yr = new YearLevel();
            $requestYearName = $data['yearName'];
            if ($requestYearName === 'First Year' ||  $requestYearName === 'Second Year' || $requestYearName === 'Third Year' || $requestYearName === 'Fourth Year' || $requestYearName === 'Fifth Year') {
                $yr->yearName = $requestYearName;
                $yr->save();
                return response([
                    'message' => 'Successfully added Year Level'
                ]);
            }
            throw new Exception('Year name does not match standards');
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function updateYearLevel($data)
    {
    }
    public function getAllYearLevels()
    {
        $years = YearLevel::all();
        return response($years, 200);
    }
    public function deleteYearLevel($id)
    {
        try {
            $yearLvl = YearLevel::find($id);
            if (is_null($yearLvl)) {
                throw new Exception('Year Level does not exist. Cannot delete.');
            }
            $yearLvl->delete();
            return response([
                'messaage' => 'Year Level has been deleted'
            ]);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ]);
        }
    }
}
