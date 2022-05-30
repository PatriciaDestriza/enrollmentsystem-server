<?php

namespace App\Repositories\Room;

use App\Models\Room;
use Exception;

class RoomRepository implements RoomRepositoryInterface
{
    public function createRoom($data)
    {

        try {


            $room = new Room();
            $roomExists = Room::where('roomCode', '=', $data['roomCode'])->first();

            if (!is_null($roomExists)) {
                throw new Exception("Room code already exists. Cannot add a new room with the same code");
            }
            $room->roomName = $data['roomName'];
            $room->roomCode = $data['roomCode'];
            $room->save();
            return response(['message' => 'Room created successfully.'], 200);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    public function editRoom($id, $data)
    {
        try {
            $room = Room::find($id);
            if (is_null($room)){
                throw new Exception('Room does not exist. Cannot edit');
            }

            $room->roomName = $data['roomName'] ?? $room->roomName;
            $room->roomCode = $data['roomCode'] ?? $room->roomCode;
            $room->save();
            return response([
                'message' => 'Room edited successfully'
            ]);
        } catch (Exception $e) {
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }
    public function getRooms()
    {
        try {
            $rooms = Room::all();
            return response($rooms, 200);
        } catch (Exception $th) {
            return response([
                'message' => $th->getMessage()
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
