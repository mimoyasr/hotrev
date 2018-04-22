<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Receptionist;

class ReceptionistController extends Controller
{
    //create receiptionist here

    public function index()
    {
    	// /$posts = Post::all();
        return view('Receiptionist.index');
    }
}
