<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;

use App\Floor;

use Illuminate\Support\Facades\Auth;

use  App\Http\Requests\RoomsStoreRequest;

use  App\Http\Requests\RoomUpdateRequest;

use Yajra\Datatables\Datatables;


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

    public function getdata()
    {

        return Datatables::of(Room::query())
        ->addColumn('action', function($query){
        $ret =  "<a href='rooms/" . $query->id . "/edit' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
        $ret .= "<button type='button' target='".$query->id."'  class='delete btn-xs btn btn-danger' > DELETE </button>";
       // $ret .= "<script>$('.delete').on('click',function(){console.log('here'); });</script>";
            return $ret;
    })->rawcolumns(['action']) ->make(true);
       
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
        
                $room = Room::create([
            'number' =>$request->number,
            'capacity' => $request->capacity,
            'price'=>$request->price,
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
            //'number' =>$request->number,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'floor_id' => $request->floor,
        ));
  
   return redirect(route('rooms.index')); 
    }

    public function delete($id)
    {
        
         Room::find($id)->delete();
         
         return json_encode([
            "status"=> 1
            ]);
    }

}