<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Auth;
use App\ErpSpeciality;

class ErpSpecialityController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialitys = ErpSpeciality::all();
        //$roles = Role::all();
        return view('backEnd.speciality.create', compact('specialitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        // $roles = Role::all();
        // return view('backEnd.users.create', compact('users','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // get all uesr emails
       // $all_user_email = User::get()->pluck('email');

        $request->validate([
            'name'=>'required',
          
        ]);

        $types = new ErpSpeciality();
        $types->name = $request->get('name');
       
           $result = $types->save();

        if($result) {
            //$user->password = Hash::make( $request->get('password') );
        
            return redirect('/speciality')->with('message-success', 'Type has been added');
        } else {
            return redirect('/speciality')->with('message-danger', 'Password does not match.');
        }

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

    
    public function edit($id)
    {
        $editData = ErpSpeciality::find($id);
        return view('backEnd.speciality.edit', compact('editData'));
    }

   
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name'=>'required',
        ]);

        $types = ErpSpeciality::find($id);
        $types->name = $request->get('name');
        
        $types->update();
        return redirect('/speciality')->with('message-success', 'Speciality name has been updated');
    }


    public function destroy($id){
        $type = ErpSpeciality::find($id);
        $type->delete();
        return redirect()->back()->with('message-success-delete', 'Speciality has been suspended successfully');
     
    }

}