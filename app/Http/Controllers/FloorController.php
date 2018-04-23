<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Floor;
class FloorController extends Controller
{
    //

    public function index()
    {
        //retreive all floors
        $floors= Floor::all();
    	return view('Floor.index',[
    		'floors' => $floors
    	]);
    }
}
