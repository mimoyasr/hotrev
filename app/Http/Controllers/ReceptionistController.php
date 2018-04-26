<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\User;

use App\Receptionist;

use App\Createdby;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Hash;

use  App\Http\Requests\ReceptionistsStoreRequest;

use  App\Http\Requests\ReceptionistsUpdateRequest;


class ReceptionistController extends Controller
{
    //create receiptionist here

    public function index()
    {
         $resps = Receptionist::all();
    
    	return view('receiptionists.index',[
    		'resps' => $resps
    	]);
    }

    public function getdata()
    {
     

        return Datatables::of(Receptionist::query())       
        ->addColumn('action', function($query){
        return view('receiptionists.action',['id'=>$query->id,'flagBan'=>$query->user->banned_at,'user_id'=>$query->user_id]);  
            
    })->rawcolumns(['action']) ->make(true);
}
    

    public function create()
    {
        $resps= Receptionist::all();
        return view('receiptionists.create');
    }

    public function store(ReceptionistsStoreRequest $request)
    {
        
      $user = User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
      
       // dd($user->id);
        Receptionist::create([
        'national_id' =>$request->national_id,
        'user_id' => $user->id,
        //photo
    ]);

    Createdby::create([
        'creater' => Auth::id(),
        'created_by' =>$user->id,
        //photo
    ]);
    return redirect(route('receiptionists.index')); 
    }

    public function edit(request $request)
    {
        //dd("djdjdjdj");
        $resps = Receptionist::whereId($request->id)->first();
        //dd($resps->user->name);
        return view('receiptionists.edit',[
            'resps' => $resps,
        ]);
    }

    public function update(ReceptionistsUpdateRequest $request)
    {
        User::where('id', $request->user_id)->update(array(
            'name' =>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ));

        Receptionist::where('id', $request->id)->update(array(
            'national_id' =>$request->national_id,
        ));
        
        return redirect(route('receiptionists.index'));
    }

    public function delete($id)
    {
        
        Receptionist::find($id)->delete();
         return redirect(route('receiptionists.index')); 
    }

    public  function banUnban($id)
{
    
   $user = User::find($id);
   if($user->isBanned())
   {
    $user->unban();
   }
   else
   {
    $user->ban();
   }
   return redirect(route('receiptionists.index')); 
   
}

}
