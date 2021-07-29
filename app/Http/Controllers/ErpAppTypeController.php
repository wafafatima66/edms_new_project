<?php

namespace App\Http\Controllers;

use App\AppTypes;
use Illuminate\Http\Request;


class ErpAppTypeController extends Controller
{
    public function index()
    {   $app_types =AppTypes::all();
        return view('backEnd.application_type.create',compact('app_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'app_name'=>'required'
        ]);


        $role = AppTypes::create(['app_type_name' => $request->get('app_name')]);
        return redirect('/application_type')->with('message-success', 'Application Type has been added');
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
        $app = AppTypes::find($id);
        return view('backEnd.application_type.edit', compact('app'));
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
        $request->validate([
            'app_name'=>'required'
        ]);
        $role = AppTypes::find($id);
        $role->app_type_name = $request->get('app_name');
        $role->save();
        return redirect('/application_type')->with('message-success', 'Application type has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = AppTypes::find($id);
        $type->delete();
        return redirect()->back()->with('message-success-delete', 'Application Type has been suspended successfully');
    }

}