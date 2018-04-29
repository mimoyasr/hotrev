<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\Createdby;
use App\Room;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EditManagerRequest;
use App\Http\Requests\StoreManagerRequest;
use Yajra\Datatables\Datatables;
use Stripe\Stripe;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($room_num)
    {
        $room = Room::where('number',$room_num);
        $room_id = $room->first()->id;
        $room_cap = $room->first()->capacity;
        // dd($room_id);
        // dd(Client::where('user_id',Auth::id())->first());
        return view('reservations.create',[
            'client' =>  Client::where('user_id',Auth::id())->first(),
            'room_id' => $room_id , 
            'room_capacity' => $room_cap ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $room_id)
    {
        // $data = $request->all();
        // dd( $request -> client_id);
        $room = Room::find($room_id);
        // dd($room);
        // 
        // $stripe = Stripe::setApiKey ('sk_test_OTbVBIU0qcbit0R0fsy2BlHh');
       
        // $stripe->charges()->create([
        //     'currency' => 'USD',
        //     'amount' => $room->price,
        //     'source' => $request->stripeToken,
        //     'description' => 'book room number' . $room->number
        // ]);
      
        Reservation::create([
            'client_id' => $request -> client_id,
            'room_id' => $room_id,
            'accompany' => $request -> no_companions ,
            'paid_price' => $request -> paid_price
        ]);
        $room->is_reserved=1;
        $room->save();

        // return "reservation Done";
        return redirect('/clients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getdata()
    {
        $client = Client::where('user_id',Auth::id())->first();
        // dd($client->user_id)
        $resrvs = Reservation::with('room')->where('client_id',$client->id)->get();
        // dd($resrvs);
        return Datatables::of($resrvs)->make(true);
    }


}
