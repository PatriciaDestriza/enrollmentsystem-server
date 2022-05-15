<?php

namespace App\Repositories\Room;

interface RoomRepositoryInterface
{
    public function createRoom($data);
    public function editRoom($id);
    public function getRooms();
    public function deleteRoom($id);
}
