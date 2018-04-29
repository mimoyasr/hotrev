<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\Floor;
use App\User;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\FloorsStoreRequest;

use App\Http\Requests\FloorUpdateRequest;

use Yajra\Datatables\Datatables;

class FloorController extends Controller
{
    //

    public function index()
    {
        //retreive all floors
        $floors= Floor::all();
    	// return view('floors.index',[
    	// 	'floors' => $floors
        // ]);
        
        return view('floors.index'); 
    }

    public function getdata()
    {

        return Datatables::of(Floor::query())
        ->addColumn('action', function($query){
            if(Auth::User()->id == $query->created_by || Auth::User()->hasRole('Admin')){
        $ret =  "<a href='floors/" . $query->id . "/edit' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
        $ret .= "<button type='button' target='".$query->id."'  class='delete btn-xs btn btn-danger' > DELETE </button>";
       // $ret .= "<script>$('.delete').on('click',function(){console.log('here'); });</script>";
            return $ret;
        }
    })
    ->addColumn('created_by',function($query){
        $user = User::whereId($query->created_by)->first();
        return $user->name;
    })
    ->rawcolumns(['action']) ->make(true);
       
    }
    public function create()
    {
        return view('floors.create');
    }

    public function store(FloorsStoreRequest $request)
    {
       
        // $collection = collect([1, 2, 3, 4, 5]);
    //make random reqursive
        $floorNo= mt_rand(1000,9999);
        $floorexist = Floor::where("nubmber",$floorNo)->exists();
      if($floorexist == false)
      {
       
        Floor::create([
            'name' =>$request->name,
            'nubmber' => $floorNo,
            'created_by' => Auth::id(),
        ]);
     } 

       return redirect(route('floors.index')); 
    }

    public function edit(request $request)
    {
       
        $floor = Floor::whereId($request->id)->first();

       

        return view('floors.edit',[
            'floor' => $floor,
        ]);
    }

    public function update(FloorUpdateRequest $request)
    {
         

   Floor::where('id', $request->id)->update(array(
            'name'    =>  $request->name,
        ));
  
   return redirect(route('floors.index')); 
    }

    public function delete($id)
    {
        
         Floor::find($id)->delete();
         return json_encode([
             "status"=> 1
             ]);
    }


    
}
