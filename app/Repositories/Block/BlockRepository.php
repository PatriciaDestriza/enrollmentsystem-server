<?php

namespace App\Repositories\Block;

use App\Models\Block;

class BlockRepository implements BlockRepositoryInterface
{
    public function createBlock($data)
    {
        $block = new Block();
    }
    public function getBlocks($data)
    {
    }
    public function editBlock($id)
    {
    }
    public function deleteBlock($id)
    {
    }
}
