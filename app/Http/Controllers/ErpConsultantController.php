<?php

namespace App\Http\Controllers;

use App\ErpConsultant;
use Illuminate\Http\Request;

class ErpConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultant = ErpConsultant::all();
        return view('backEnd.consultant.create', compact('consultant'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
    
       $request->validate([
        'name'=>'required',
      
    ]);

    $types = new ErpConsultant();
    $types->name = $request->get('name');
   
       $result = $types->save();

    if($result) {
        
        return redirect('/consultant')->with('message-success', 'Consultant has been added');
    } else {
        return redirect('/consultant')->with('message-danger', 'Consultant not added');
    }
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $editData = ErpConsultant::find($id);
        return view('backEnd.consultant.edit', compact('editData'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $types = ErpConsultant::find($id);
        $types->name = $request->get('name');
        
        $types->update();
        return redirect('/consultant')->with('message-success', 'Consultant name has been updated');
    }

    
    public function destroy($id)
    {
        $type = ErpConsultant::find($id);
        $type->delete();
        return redirect()->back()->with('message-success-delete', 'Consultant has been suspended successfully');
    }
}
