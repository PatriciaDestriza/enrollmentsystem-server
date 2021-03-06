<?php

namespace App\Repositories\Block;

interface BlockRepositoryInterface
{
    public function createBlock($data);
    public function getBlocks();
    public function editBlock($id);
    public function deleteBlock($id);
}
