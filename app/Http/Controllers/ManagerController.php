<?php

namespace App\Http\Controllers;

use App\Manager;
use App\User;
use App\Createdby;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EditManagerRequest;
use App\Http\Requests\StoreManagerRequest;
use Yajra\Datatables\Datatables;

class ManagerController extends Controller
{
   
    public function index()
    {
        $manager=Manager::all();
        return view("manager.index",[
            "managers"=> $manager
        ]);
    }

    public function create()
    {
        return view ("manager.create");
    }

   
    public function store(StoreManagerRequest $request)
    {
        dd(Auth::id());
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
        $data['password']=bcrypt($request->password);
        $user = User::create($data);
        $data['user_id'] = $user->id ;
        $manager = Manager::create($data);
        Createdby::create(['creator' => Auth::id() , 'created_by' => $manager->id]);
        $user->assignRole('Manager');
        $user->assignRole('Receptionist');
        $user->assignRole('Client');
        return redirect(route('managers.index'));
    }

  
    public function edit(Manager $manager)
    {
        return view("manager.edit",["managers"=>$manager]);
    }

   
    public function update(EditManagerRequest $request, Manager $manager)
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
        $data['password']=bcrypt($request->password);
        $manager->update($data);
        $manager->user->update($data);
        return redirect(route('managers.index'));
    }

 
    public function destroy(Manager $manager)
    {
        $manager->delete();
        return json_encode([
            "status"=> 1
            ]);    }


    public function getdata()
    {
        
    return Datatables::of(Manager::all())
    ->addColumn('action', function($query){
    $ret =  "<div class='row' > <div class='col-xs-4' > <a href='managers/" . $query->id . "/edit' class='btn  btn-primary'><i class='glyphicon glyphicon-edit'></i> Edit</a> </div>";
    $ret .= "<div class='col-xs-4' > <button type='button' target='".$query->id."'  class='delete  btn btn-danger' > DELETE </button> </div> </div>";
        return $ret;
    })
    ->addColumn('name', function($query){return $query->user->name;})
    ->addColumn('photo', function($query){return "<img src='".asset('uploads/'.$query->photo)."' width='100px' height='100px' /> ";})
    ->addColumn('nationalid', function($query){return $query->national_id;})
    ->addColumn('email', function($query){return $query->user->email;})
    ->rawcolumns(['action','name','photo','nationalid','email'])
    ->make(true);

    }


}
