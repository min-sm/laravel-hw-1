<?php

namespace App\Http\Middleware;

use App\Models\Drug;
use App\Models\Room;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyCustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $room_model = new Room();
        $numOfRoom = $room_model->numOfRoom();
        $numOfRoom = $numOfRoom[0]->num;
        
        $drug_model = new Drug();
        $numOfDrug = $drug_model->numOfDrug();
        
        view()->share('numOfRoom', $numOfRoom);
        view()->share('numOfDrug', $numOfDrug);
        return $next($request);
    }
}
