<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;

    public function roomListDashboard()
    {
        // return dd(DB::table('rooms')
        //     ->where('del_flg', 0)
        //     ->orderByDesc('created_at')
        //     ->limit(4)
        //     ->toSql());
        return DB::table('rooms')
            ->where('del_flg', 0)
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();
    }

    public function roomList()
    {
        return DB::table('rooms')->where('del_flg', 0)->orderBy('room_no')->paginate('10');
    }

    public function lastAddedRoom()
    {
        return Room::orderBy('id', 'desc')->first();
    }

    public function roomDelete($id)
    {
        return DB::table('rooms')->where('id', $id)->update(['del_flg' => 1]);
    }

    public function addRoom($dataToBeAdded)
    {
        // Query Builder
        DB::table('rooms')->insert(["room_no" => $dataToBeAdded["room_no"], "room_status" => $dataToBeAdded["room_status"], "room_no_of_patients" => $dataToBeAdded["room_no_of_patients"], "room_price" => $dataToBeAdded["room_price"]]);

        // Eloquent ORM
        // $room = new Room();
        // $room->room_no = $dataToBeAdded->room_no;
        // $room->room_status = $dataToBeAdded->room_status;
        // $room->room_no_of_patients = $dataToBeAdded->no_of_patients;
        // $room->room_price = $dataToBeAdded->room->price;
        // $room->save();
    }
}
