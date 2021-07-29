<?php

namespace App\Http\Controllers;

use App\AppTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Auth;
use App\ErpDocumentType;
use App\PatientDocument;
use Illuminate\Support\Facades\DB;

class ErpDocTypeController extends Controller
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
        $doc_types = ErpDocumentType::all();
        $app_types = AppTypes::all();
        //$roles = Role::all();
        return view('backEnd.doc_type.create', compact('doc_types','app_types'));
    }

    public function getDoc($id) 
    {        
            $docs = ErpDocumentType::where("app_type",$id)->pluck("type_name","id");
            return json_encode($docs);
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

        

        $request->validate([
            'app_type'=>'required',
            'type_name'=>'required',
            'type_code' => 'required'
        ]);

        $types = new ErpDocumentType();
        $types->app_type = $request->get('app_type');
        $types->type_name = $request->get('type_name');
        $types->type_code = $request->get('type_code');
           $result = $types->save();

        if($result) {
            //$user->password = Hash::make( $request->get('password') );
        
            return redirect('/doc_type_code')->with('message-success', 'Type has been added');
        } else {
            return redirect('/doc_type_code')->with('message-danger', 'Password does not match.');
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
        $editData = ErpDocumentType::find($id);
        $app_types = AppTypes::all();
        return view('backEnd.doc_type.edit', compact('editData','app_types'));
    }

   
    public function update(Request $request, $id)
    {
        
        
        $request->validate([
            'app_type'=>'required',
            'type_name'=>'required',
            'type_code' => 'required'
        ]);

        $types = ErpDocumentType::find($id);
        $app_type = $request->get('app_type');
        $types->app_type = $app_type ;
        $types->type_name = $request->get('type_name');
        $types->type_code = $request->get('type_code');

        DB::table('patient_documents')
            ->where('doc_type', $id)
            ->update(['app_type' => $app_type]);
        
        $types->update();
        return redirect('/doc_type_code')->with('message-success', 'Document type has been updated');
    }

   

    public function destroy($id){
        $type = ErpDocumentType::find($id);
        
        DB::table('patient_documents')
            ->where('doc_type', $id)
            ->update(['active_status' => 0]);

        $type->delete();
        return redirect()->back()->with('message-success-delete', 'Document Type has been suspended successfully');
     
    }

    
}
