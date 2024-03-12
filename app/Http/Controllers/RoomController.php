<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room_model = new Room();
        $rooms = $room_model->roomList();

        return view('room.room', ["bladeRooms" => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room_model = new Room();
        $room = $room_model->lastAddedRoom();
        $room_no = $room->room_no;

        // Extracting the prefix (e.g., 2, 3) from the room number
        $first_digit = substr($room_no, 0, 1);
        $first_digit *= 100;

        // Extracting the number part (e.g., 15, 14) from the room number
        $remaining_digits = intval(substr($room_no, 1));

        // If the remaining digits are greater than 15, increment by 86
        if ($remaining_digits > 15) {
            $remaining_digits = 101;
        } else {
            // If the remaining digits are less than or equal to 15, increment by 1
            $remaining_digits++;
        }

        // Form the new room number
        $new_room_no = $first_digit + $remaining_digits;
        return view('room.room_add', ["room_no" => $new_room_no]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // need to custom validation to check for numbers within the range of 0 to 10 for room_no_of_patients
        $request->validate(["room_no" => "required|numeric", "room_no_of_patients" => "required|numeric", "room_price" => "required|numeric"]);

        $room_model = new Room();
        if ($request->room_no_of_patients == 0) {
            $room_status = 1;
        } else if ($request->room_no_of_patients == 10) {
            $room_status = 3;
        } else {
            $room_status = 2;
        }
        $dataToBeAdded = $request->all();
        $dataToBeAdded['room_status'] = $room_status;
        $room_model->addRoom($dataToBeAdded);

        Log::info("A new room, $request->room_no, is added", ["room num" => $request->room_no]);
        Log::channel("customlog")->debug("Custom log test. A new room, $request->room_no, is added", ["room num" => $request->room_no]);
        return redirect('/room');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room_model = new Room();
        $room = $room_model->findRoom($id);
        return view('room.room_edit', ["room" => $room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $room_model = new Room();
        if ($request->room_no_of_patients == 0) {
            $room_status = 1;
        } else if ($request->room_no_of_patients == 10) {
            $room_status = 3;
        } else {
            $room_status = 2;
        }
        $dataToBeAdded = $request->all();
        $dataToBeAdded['room_status'] = $room_status;
        $room_model->updateRoomByID($dataToBeAdded, $id);

        return redirect('/room');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $room_model = new Room();
        $rooms = $room_model->roomDelete($id);
        return redirect('/room');
    }
}
