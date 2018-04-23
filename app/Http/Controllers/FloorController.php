<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\Floor;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\FloorsStoreRequest;

class FloorController extends Controller
{
    //

    public function index()
    {
        //retreive all floors
        $floors= Floor::all();
    	return view('floors.index',[
    		'floors' => $floors
    	]);
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
}
