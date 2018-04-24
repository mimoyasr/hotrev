<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\Floor;
use Illuminate\Support\Facades\Auth;

use  App\Http\Requests\RoomsStoreRequest;

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

    //  public function edit(request $request)
    // {
       
    //     $floor = Floor::whereId($request->id)->first();

       

    //     return view('floors.edit',[
    //         'floor' => $floor,
    //     ]);
    // }

//     public function update(FloorUpdateRequest $request)
//     {
         

//    Floor::where('id', $request->id)->update(array(
//             'name'    =>  $request->name,
//         ));
  
//    return redirect(route('floors.index')); 
//     }

    public function delete($id)
    {
        
         Room::find($id)->delete();
         return redirect(route('rooms.index')); 
    }

}