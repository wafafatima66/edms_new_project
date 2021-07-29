<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpPatient;
use App\ActivityLog;
use App\AppTypes;
use App\ErpDocumentType;
use App\ErpHeader;
use App\PatientDocument;
use DB;
use App\User;
use Auth;
use Illuminate\Support\Carbon;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $head = ErpHeader::find('1');
        $header = $head->header;
        $header_t = $head->header_title;
        session()->flash('header', $header);
        session()->flash('header_t', $header_t);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $Patient = ErpPatient::where('active_status', '=', 1)->get();

        $allApp=AppTypes::all();
       
        // $RioAppDoc = ErpDocumentType::where('app_type_name','Rio')->count();
        // $MosaicAppDoc = ErpDocumentType::where('app_type_name','Mosaic')->count();
        // $SynergyAppDoc = ErpDocumentType::where('app_type_name','Synergy')->count();
        
        $users = User::all();
        $userss = User::where('id', auth::user()->id)->first();
        Session::put('users_img', $userss->upload_img);
        $logs = "";
        $dateS = Carbon::now()->subMonth(1);
        $dateE = Carbon::now(); 
        if(Auth::user()->getRoleNames()->first() == 'Adminstrator'){
            $logs = ActivityLog::whereBetween('created_at',[$dateS,$dateE])->orderBy('created_at', 'desc')->get();
        }
        else
        {
            $id = auth::user()->id;
            $logs = ActivityLog::whereBetween('created_at',[$dateS,$dateE])->where('user_id',$id)->get();
        }
        
        $dashboard = ErpHeader::find('1');
    
        return view('backEnd.dashboard', compact('userss', 'Patient', 'logs','dashboard','allApp'));
    }

    public function getDocumentTypes($id){

        // $allDocType = ErpDocumentType::with('docs')
        // ->get();
        $allDocType = DB::select( DB::raw("SELECT erp_document_types.*, (SELECT COUNT(id) FROM patient_documents WHERE active_status = 1 AND doc_type = erp_document_types.id) total_doc_nos
            FROM erp_document_types
            WHERE erp_document_types.app_type = '$id' "));

           
        $allDoc = PatientDocument::where('active_status','1')
                                ->where('app_type',$id)
                                ->get();
        return view('backEnd.all_doc.doc_dashboard',compact('allDocType','allDoc','id'));
    }

   

}
