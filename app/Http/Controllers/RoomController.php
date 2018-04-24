<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\Floor;
use Illuminate\Support\Facades\Auth;

use  App\Http\Requests\RoomsStoreRequest;

use  App\Http\Requests\RoomUpdateRequest;

class RoomController extends Controller
{
    //
    public function index()
    {
        //retreive all floors
        $rooms= Room::all();
    	return view('rooms.index',[
    		'rooms' => $rooms
    	]);
    }

    public function create()
    {
        $floors= Floor::all();
        return view('rooms.create',[
            'floors' => $floors
        ]
    
    );
    }

    public function store(RoomsStoreRequest $request)
    {
       
        Room::create([
            'number' =>$request->number,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'floor_id' => $request->floor,
            'created_by' => Auth::id(),
        ]);
        return redirect(route('rooms.index')); 
     }

     public function edit(request $request)
    {
        $floors= Floor::all();
        $room = Room::whereId($request->id)->first();

        return view('rooms.edit',[
            'room' => $room,
            'floors' => $floors,
        ]);
    }

    public function update(RoomUpdateRequest $request)
    {
         

   Room::where('id', $request->id)->update(array(
            'number' =>$request->number,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'floor_id' => $request->floor,
        ));
  
   return redirect(route('rooms.index')); 
    }

    public function delete($id)
    {
        
         Room::find($id)->delete();
         return redirect(route('rooms.index')); 
    }

}