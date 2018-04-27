<?php

namespace App\Http\Controllers\Api;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RoomController extends Controller
{
   
    public function index()
    {   $room=Room::all();
        return $room;
    }

    
}
