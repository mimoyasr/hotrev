<?php

namespace App\Http\Controllers;

use App\Client;
use App\Country;
use App\Rooms;
use App\Http\Requests\StoreClinetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create',['conts' => Country::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreClinetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinetRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time().'.'.$photo->getClientOriginalExtension();
            $data['photo'] = $filename;
            $destinationPath = public_path('uploads');
            if(!$photo->move($destinationPath, $filename)){
                return 'Error saving the file.';
            }
        }
        $data['user_id'] = Auth::id();
        $data['approved_by'] = 1 ;
        $data['is_approved'] = 0 ;
        Client::create($data);
        return redirect('/home');
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }


    public function getdata()
    {
        
    return Datatables::of(DB::table('rooms')->where('is_reserved',0)->get())
    ->addColumn('action', function($query){
    $ret =  "<div class='text-center' > <button type='button' target='".$query->id."'  class=' btn btn-primary' > Reserve </button> </div>";
        return $ret;
    })
    ->rawcolumns(['action'])
    ->make(true);

    }

}
