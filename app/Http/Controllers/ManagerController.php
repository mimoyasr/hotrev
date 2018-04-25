<?php

namespace App\Http\Controllers;

use App\Manager;
use App\User;
use App\Createdby;
use Illuminate\Http\Request;
use App\Http\Requests\EditManagerRequest;
use App\Http\Requests\StoreManagerRequest;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $manager=Manager::all();
        return view("manager.index",[
            "managers"=> $manager
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("manager.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManagerRequest $request)
    {
        /**
         * [
         * name,
         * email,
         * password,
         * photo,
         * national_id
         * ]
         */
        $data = $request->all();
        $user = User::create($data);
        $data['user_id'] = $user->id ;
        $manager = Manager::create($data);
        Createdby::create(['creator' => Auth::id() , 'created_by' => $manager->id]);
        $manager->assignRole('Manager');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        return view("manager.edit",["managers"=>$manager]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EditManagerRequest  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(EditManagerRequest $request, Manager $manager)
    {
        $manager->update($request->all());
        return redirect(route('manager.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect(route('manager.index'));
    }
}
