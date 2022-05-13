<?php

namespace App\Repositories\Block;

interface BlockRepositoryInterface
{

    public function createBlock($data);
    public function getBlocks($data);
    public function editBlock($id);
    public function deleteBlock($id);
}
