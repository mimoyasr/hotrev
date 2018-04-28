<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use App\Client;
use Auth;
use DB;
use App\Quotation;
class ApprovedClientsReservationsDataTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $receptionist_current_id=Auth::user()->id;
        //need some permission
        $reservations = Reservation::join('clients',
            'clients.id',
            '=', 'client_id')
            ->join('rooms',
            'rooms.id',
            '=', 'room_id')
            ->select(['number',
                'clients.mobile',
                'clients.country',
                'clients.gender',
                'client_id',
                'accompany',
                'paid_price'
                ])->Where("clients.approved_by" ,$receptionist_current_id);

        return datatables()->of($reservations) ->addColumn('name',
            function ($reservation_row) {
                $client_name=$reservation_row->client->user->name;
                return $client_name;
            })->toJson();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
