<?php

namespace App\Repositories\Block;

use App\Models\Block;
use App\Models\Program;
use Exception;

class BlockRepository implements BlockRepositoryInterface
{
    public function createBlock($data)
    {
        try {
            $program_exists = Program::find($data['programID']);
            if (is_null($program_exists)) {
                throw new Exception("The program you're adding does not exist");
            }

            $blockExists = Block::where('blockCode', '=', $data['blockCode'])->first();
            if (!is_null($blockExists)) {
                throw new Exception('Block already exists.');
            }

            $block = new Block();
            $block->blockName = $data['blockName'];
            $block->blockCode = $data['blockCode'];
            $block->programID = $data['programID'];
            $block->yearID = $data['yearID'];
            $block->save();
            return response([
                'message' => 'Block created successfully'
            ]);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ], 400);
        }
    }
    public function getBlocks()
    {
        return Block::with('program', 'courses', 'students', 'academic_term')->get();
    }
    public function editBlock($id)
    {
    }
    public function deleteBlock($id)
    {
        try {
            $block = Block::find($id);
            if (is_null($block)) {
                throw new Exception('Block does not exist. Cannot delete');
            }
            $block->delete();
            return response([
                'message' => 'Block has been deleted'
            ]);
        } catch (Exception $error) {
            return response([
                'message' => $error->getMessage()
            ]);
        }
    }
}
