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
        return DB::table('drugs')->where('del_flg', 0)->orderByDesc('created_at')->limit(4)->get();
    }
}
