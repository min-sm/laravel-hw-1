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

    public function roomDelete($id)
    {
        return DB::table('rooms')->where('id', $id)->update(['del_flg' => 1]);
    }
}
