<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\Floor;

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

        return Datatables::of(Floor::query())->make(true);
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
         return redirect(route('floors.index')); 
    }


    
}
