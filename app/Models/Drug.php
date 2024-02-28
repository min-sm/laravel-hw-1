<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Drug extends Model
{
    use HasFactory;

    public function drugListDashboard()
    {
        // Eloquent
        return Drug::where('del_flg', 0)->orderByDesc('created_at')->limit(4)->get();

        // Query Builder
        // return DB::table('drugs')->where('del_flg', 0)->orderByDesc('created_at')->limit(4)->get();
    }

    public function drugList()
    {
        return Drug::where('del_flg', 0)->paginate('10');
    }

    public function deleteDrug($id)
    {
        return Drug::where('id', $id)->update(["del_flg" => 1]);
    }

    public static function numOfDrug()
    {
        return self::where('del_flg', 0)->count();
    }
}
