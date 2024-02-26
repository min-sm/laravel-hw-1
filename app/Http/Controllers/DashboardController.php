<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function lists()
    {
        // for room
        $room_model = new Room();
        $rooms = $room_model->roomListDashboard();

        // for drug
        $drug_model = new Drug();
        $drugs = $drug_model->drugListDashboard();
        return view('dashboard.dashboard', ["bladeRooms" => $rooms, "bladeDrugs" => $drugs]);
    }
}
