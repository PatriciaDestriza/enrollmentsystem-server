<?php

namespace App\Repositories\Room;

use App\Models\Room;
use Exception;

class RoomRepository implements RoomRepositoryInterface
{
    public function createRoom($data)
    {
        $room = new Room();

        try {
            $room->roomName = $data['roomName'];
            $room->roomCode = $data['roomCode'];
            $room->save();
            return response(['message' => 'Room created successfully.'], 200);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function editRoom($id)
    {
    }
    public function getRooms()
    {
        try {
            $rooms = Room::all();
            return response($rooms, 200);
        } catch (Exception $th) {
            return response([
                'message' => 'Something went wrong'
            ], 400);
        }
    }
    public function deleteRoom($id)
    {
        try {
            $rooms = Room::find($id)->delete();
            return response([
                'message' => 'Room has been deleted'
            ], 200);
        } catch (Exception $th) {
            return response([
                'message' => 'Something went wrong'
            ], 400);
        }
    }
}
