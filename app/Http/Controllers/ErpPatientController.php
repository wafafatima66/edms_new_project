<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpPatient;
use App\PatientDocument;
use App\ErpEmployee;
use App\ErpDepartment;
use App\ErpDesignation;
use App\ErpBaseSetup;
use Auth;
use App\ErpSupportPlan;
use PDF;
use Illuminate\Support\Facades\Response;
use App\ActivityLog;
use App\AppTypes;
use App\ErpSpeciality;
use App\ErpDocumentType;
use App\ErpConsultant;
use App\ErpSendDoc;
use DB;
use Mail;
use App\PatientDocumentVersion;
use App\User;
use App\Mail\SendEmailToUser;
use Session;

class ErpPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $patients = ErpPatient::where('active_status', '=', 1)->get();
        return view('backEnd.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $support_plans = ErpSupportPlan::all();
        return view('backEnd.patients.create');
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
            'patient_id' => 'required',
            'first_name' => 'required',
            'sur_name' => 'required',
            'title' => 'required',
            'date_of_birth' => 'required'
        ]);

        $signature = "";
        if ($request->file('signature') != "") {
            $file = $request->file('signature');
            $signature = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('public/uploads/signature/', $signature);
            $signature = 'public/uploads/signature/' . $signature;
        }

        $support_plan = array();
        if (empty($request->support_plan)) {
            $support_plan = '';
        } else {
            $support_plan = implode(',', $request->support_plan);
        }

        if (empty($request->date_of_birth)) {
            $date_of_birth = null;
        } else {
            $date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        }


        if (empty($request->date_of_death)) {
            $date_of_death = null;
        } else {
            $date_of_death = date('Y-m-d', strtotime($request->date_of_death));
        }

        if (empty($request->behavihour_date)) {
            $behavihour_date = null;
        } else {
            $behavihour_date = date('Y-m-d', strtotime($request->behavihour_date));
        }

        $patients = new ErpPatient();
        $patients->patient_id = $request->get('patient_id');
        $patients->title = $request->get('title');
        $patients->first_name = $request->get('first_name');
        $patients->sur_name = $request->get('sur_name');
        $patients->last_name = $request->get('middle_name');
        $full_name = $request->get('first_name') . ' ' . $request->get('sur_name') . ' ' . $request->get('middle_name');
        $patients->full_name =  $full_name;
        $patients->mobile = $request->get('mobile');
        $patients->nhs_no = $request->get('nhs_no');
        $patients->post_code = $request->get('post_code');
        $patients->date_of_birth = $date_of_birth;
        $patients->date_of_death = $date_of_death;
        $patients->next_of_kin = $request->get('next_of_kin');
        $patients->gender = $request->get('gender');
        $patients->address = $request->get('address');
        $patients->support_plan = $support_plan;
        $patients->behaviour = $request->behaviour;
        $patients->education = $request->education;
        $patients->daily_living_skills = $request->daily_living_skills;
        $patients->communication = $request->communication;
        $patients->signature = $signature;
        $patients->position = $request->position;
        $patients->behabiour_date = $behavihour_date;
        $patients->gp_details = $request->get('gp_details');
        $patients->created_by = Auth::user()->id;
        $results = $patients->save();


        if ($results) {
            return redirect('/patient')->with('message-success', 'Patient has been added');
        } else {
            return redirect('/patient')->with('message-danger', 'Something went wrong');
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
        session()->forget('doc_id');
        session()->forget('doc_type');
        $patient = ErpPatient::find($id);
        
        $documents = DB::table('patient_documents')
            ->leftjoin('erp_document_types', 'patient_documents.doc_type', '=', 'erp_document_types.id')
            ->leftjoin('erp_specialities', 'patient_documents.speciality', '=', 'erp_specialities.id')
            ->select('patient_documents.*', 'erp_specialities.name', 'erp_document_types.type_name')
            ->where('patient_documents.patient_id', $patient->patient_id)
            ->get();
        return view('backEnd.patients.show', compact('patient', 'documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function patients_doc_types($patient_id){
        

       // echo $patient_id;exit;

        $patient_data = ErpPatient::find($patient_id);


        $patient_user_define_id = $patient_data->patient_id;
        Session::put('patient_id', $patient_user_define_id);

        // $allDocType = ErpDocumentType::with('patient_docs')->get();
        $allDocType = ErpDocumentType::all();
        $allDoc = PatientDocument::where('check_in_out','1')->where('patient_id', $patient_user_define_id)->get();
        return view('backEnd.patients.doc_dashboard',compact('allDocType','allDoc', 'patient_user_define_id', 'patient_data'));
    }

    public function edit($id)
    {
        $support_plans = ErpSupportPlan::all();
        $editData = ErpPatient::find($id);



        return view('backEnd.patients.edit', compact('editData', 'support_plans'));
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
        // echo "<pre>";
        // print_r($_POST);
        // exit;

        $request->validate([
            'patient_id' => 'required',
            'first_name' => 'required',
            'sur_name' => 'required',
            'title' => 'required',
            'date_of_birth' => 'required'
        ]);

        $signature = "";
        if ($request->file('signature') != "") {
            $file = $request->file('signature');
            $signature = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('public/uploads/signature/', $signature);
            $signature = 'public/uploads/signature/' . $signature;
        }


        $support_plan = array();
        if (empty($request->support_plan)) {
            $support_plan = '';
        } else {
            $support_plan = implode(',', $request->support_plan);
        }

        if (empty($request->date_of_birth)) {
            $date_of_birth = null;
        } else {
            $date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        }

        if (empty($request->date_of_death)) {
            $date_of_death = null;
        } else {
            $date_of_death = date('Y-m-d', strtotime($request->date_of_death));
        }

        if (empty($request->behabiour_date)) {
            $behabiour_date = null;
        } else {
            $behabiour_date = date('Y-m-d', strtotime($request->behabiour_date));
        }

        $patients = ErpPatient::find($id);
        $patients->patient_id = $request->get('patient_id');
        $patients->title = $request->get('title');
        $patients->first_name = $request->get('first_name');
        $patients->sur_name = $request->get('sur_name');
        $patients->last_name = $request->get('middle_name');
        $full_name = $request->get('first_name') . ' ' . $request->get('sur_name') . ' ' . $request->get('middle_name');
        $patients->full_name = $full_name;
        $patients->mobile = $request->get('mobile');
        $patients->nhs_no = $request->get('nhs_no');
        $patients->post_code = $request->get('post_code');
        $patients->date_of_birth = $date_of_birth;
        $patients->date_of_death = $date_of_death;
        $patients->next_of_kin = $request->get('next_of_kin');
        $patients->address = $request->get('address');
        $patients->support_plan = $support_plan;
        $patients->gp_details = $request->get('gp_details');
        $patients->behaviour = $request->behaviour;
        $patients->behaviour = $request->behaviour;
        $patients->education = $request->education;
        $patients->daily_living_skills = $request->daily_living_skills;
        $patients->signature = $signature;
        $patients->position = $request->position;
        $patients->behabiour_date = $behabiour_date;
        $patients->updated_by = Auth::user()->name;
        $results = $patients->update();
        if ($results) {
            return redirect('/patient')->with('message-success', 'Patient has been updated');
        } else {
            return redirect('/patient')->with('message-danger', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePateientView($id)
    {
        $module = 'deletePateient';
        return view('backEnd.showDeleteModal', compact('id', 'module'));
    }

    public function deletePateient($id)
    {
        $employee = ErpPatient::find($id);
        $employee->active_status = 0;

        $results = $employee->update();
        if ($results) {
            return redirect()->back()->with('message-success-delete', 'Patient has been deleted successfully');
        } else {
            return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
        }
    }

    public function createDoc()
    {
        $patient = ErpPatient::find(11);
        $specalitys = ErpSpeciality::all();
        $consultants = ErpConsultant::all();
        $doc_types = ErpDocumentType::all();
        $app_types = AppTypes::all();
        return view('backEnd.patients.createDoc', compact('patient', 'specalitys', 'consultants', 'doc_types','app_types'));
    }

    public function getDoc($id) 
    {        
            $docs = ErpDocumentType::where("app_type",$id)->pluck("type_name","id");
            return json_encode($docs);
    }

    public function storeDoc(Request $request)
    {

        //$file = $request->file('upload_document');

        ini_set('memory_limit','256M');
        
        $request->validate([
            'document_type_code' => 'required',
            'doc_type' => 'required',
            'document_name' => 'required',
            // 'owner'=> 'required',
            //'upload_document' => 'required|mimes:pdf,doc,docx,xls,xlsx,csv,zip,png,jpg,jpeg',
        ]);

        if (empty($request->created_date)) {
            $created_date = null;
        } else {
            $created_date = date('Y-m-d', strtotime($request->created_date));
        }

        if (empty($request->document_date)) {
            $document_date = null;
        } else {
            $document_date = date('Y-m-d', strtotime($request->document_date));
        }


        $document = new PatientDocument();
        //$document->patient_id = $request->patient_id;
        $document->app_type = $request->app_type;
        $document->document_type_code = $request->document_type_code;
        $document->doc_type = $request->doc_type;
        $document->document_name = $request->get('document_name');
        $document->owner = $request->owner;
        $document->speciality = $request->speciality;
        $document->consultant = $request->consultant;
        $document->created_date = $created_date;
        $document->document_date = $document_date;

        $document->version_no = 1.1;
        $file_type = '';
        //$document->acl = $request->acl;
        if ($request->hasFile('upload_document')) {
            $upload = $request->file('upload_document');
            $file_type = $upload->getClientOriginalExtension();
            $upload_name =  time() . $upload->getClientOriginalName();
            $destinationPath = public_path('/uploads/documents');
            $upload->move($destinationPath, $upload_name);
            $document->upload_document = '/uploads/documents/' . $upload_name;
        }
        $document->file_type = $file_type;
        $result = $document->save();
        $LastInsertId = $document->id;

        ActivityLog::updateDocumentLog('created document',  $document->id);

        if ($result) {

            $documentVersions = new PatientDocumentVersion();
            $documentVersions->doc_id = $LastInsertId;
            $documentVersions->version_no = 1.1;
            $documentVersions->document_type_code = $request->document_type_code;
            $documentVersions->doc_type = $request->doc_type;
            $documentVersions->document_name = $request->get('document_name');
            $documentVersions->owner = $request->owner;
            $documentVersions->created_date = $created_date;
            $documentVersions->document_date = $document_date;
            $documentVersions->speciality = $request->speciality;
            $documentVersions->consultant = $request->consultant;
            //$documentVersions->acl = $request->acl;
            $documentVersions->version_type = $request->version_type;
            $documentVersions->upload_document = '/uploads/documents/' . $upload_name;
            $documentVersions->file_type = $file_type;

            $results = $documentVersions->save();

            return redirect()->back()->with('message-success', 'Document has been uploaded successfully');
        } else {
            return redirect()->back()->with('message-danger', 'Something went wrong. Please try again');
        }
    }

    public function editDoc($id)
    {
        session()->forget('doc_id');
        session()->forget('doc_type');
        $editData = PatientDocument::find($id);
        $specalitys = ErpSpeciality::all();
        $consultants = ErpConsultant::all();
        $doc_types = ErpDocumentType::all();
        return view('backEnd.patients.editDoc', compact('editData', 'specalitys', 'doc_types', 'consultants'));
    }

    public function updateDoc(Request $request, $id)
    {
        $request->validate([
            'document_type_code' => 'required',
            'doc_type' => 'required',
            'document_name' => 'required',
            //'owner'=> 'required',
            // 'upload_document'=> 'mimes:pdf,doc,docx,xls,xlsx,csv,zip,png,jpg,jpeg',
        ]);

        if (empty($request->created_date)) {
            $created_date = null;
        } else {
            $created_date = date('Y-m-d', strtotime($request->created_date));
        }

        if (empty($request->document_date)) {
            $document_date = null;
        } else {
            $document_date = date('Y-m-d', strtotime($request->document_date));
        }


        $document = PatientDocument::find($id);
        $document->app_type = $request->app_type;
        $document->document_type_code = $request->document_type_code;
        $document->doc_type = $request->doc_type;
        $document->document_name = $request->get('document_name');
        $document->owner = $request->owner;
        $document->created_date = $created_date;
        $document->document_date = $document_date;
        $document->speciality = $request->speciality;
        $document->consultant = $request->consultant;
        $document->acl = $request->acl;
        $document->version_type = $request->version_type;

        $previous_ver = $document->version_no + 0.1;
        $current_vers = number_format($previous_ver, 1);


        $document->version_no =  $current_vers;
        //$document->previous_id = $doc->id;
        if ($request->hasFile('upload_document')) {
            $upload = $request->file('upload_document');
            $file_type = $upload->getClientOriginalExtension();
            $document->file_type = $file_type;
            $upload_name =  time() . $upload->getClientOriginalName();
            $destinationPath = public_path('/uploads/documents');
            $upload->move($destinationPath, $upload_name);
            $document->upload_document = '/uploads/documents/' . $upload_name;
            $document->file_type = $file_type;
        } 
        
        else{
            // $last_version_no =   DB::table('patient_document_versions')
            // ->select(['upload_document', 'file_type' , DB::raw('MAX(version_no)')])
            // ->where('doc_id', '=', $id)
            // ->first();


            $last_version_no = PatientDocumentVersion::orderBy('version_no', 'desc')->where('doc_id','=',$id)->first();

            $document->upload_document = $last_version_no->upload_document;
            $document->file_type =  $last_version_no->file_type;
        }
       
        $ress = $document->update();

        if ($ress) {
            // if($request->version_type == 'Minor'){

            // }
            // if($request->version_type == 'Major'){

            // }

            //$previous_ver = $document->version_no+0.1;
            //$current_vers = number_format($previous_ver, 1);

            $last_version = DB::select(DB::raw("SELECT max(version_no) as m_versio_no FROM `patient_document_versions` WHERE doc_id= $id"))[0];

            $vers_no = $last_version->m_versio_no + 0.1;
            $curr_no = number_format($vers_no, 1);



            $result = ActivityLog::updateDocumentLog('updated document',  $id);



            $documentVersions = new PatientDocumentVersion();
            $documentVersions->doc_id = $id;
            $documentVersions->version_no = $document->version_no + 0.1;
            $documentVersions->document_type_code = $request->document_type_code;
            $documentVersions->doc_type = $request->doc_type;
            $documentVersions->document_name = $request->get('document_name');
            $documentVersions->owner = $request->owner;
            $documentVersions->created_date = $created_date;
            $documentVersions->document_date = $document_date;
            $documentVersions->speciality = $request->speciality;
            $documentVersions->consultant = $request->consultant;
            $documentVersions->acl = $request->acl;
            $documentVersions->version_type = $request->version_type;
            $documentVersions->version_no = $curr_no;
            //$documentVersions->previous_id = $doc->id;
            // $documentVersions->upload_document = $document->upload_document;

            if ($request->hasFile('upload_document')) {

                $documentVersions->upload_document = $document->upload_document;
                $documentVersions->file_type = $file_type;
            }else{
                // $last_version_no =   DB::table('patient_document_versions')
                // ->select(['upload_document', 'file_type' , DB::raw('MAX(version_no)')])
                // ->where('doc_id', '=', $id)
                // ->first();


                // $last_version_no = DB::select(DB::raw("SELECT MAX(version_no), upload_document, file_type FROM `patient_document_versions` WHERE doc_id= $id"))[0];
    
                $last_version_no = PatientDocumentVersion::orderBy('version_no', 'desc')->where('doc_id','=',$id)->first();

                $documentVersions->upload_document = $last_version_no->upload_document;
                $documentVersions->file_type =  $last_version_no->file_type;
            }

            $results = $documentVersions->save();

            if(session()->has('doc_id'))
            {
               $docId = session()->get('doc_id');
               $docType = session()->get('doc_type');
                if ($results) {
                    return redirect('doc_list/'.$docId.'/'.$docType)->with('message-success', 'Document has been updated successfully');
                } else {
                    return redirect()->back()->with('message-danger', 'Something went wrong. Please try again');
                }
            }
            else
            {
                if ($results) {
                    $patientData = ErpPatient::where('patient_id', '=', $document->patient_id)->first();

                    return redirect()->route('patient.show', $patientData->id)->with('message-success', 'Document has been updated successfully');
                } else {
                    return redirect()->back()->with('message-danger', 'Something went wrong. Please try again');
                }
            }


           
        }
    }

    public function deleteDocumentView($id)
    {
        $module = 'deleteDocument';
        return view('backEnd.showDeleteModal', compact('id', 'module'));
    }
    
    public function deleteDocument($id)
    {
        // $document = PatientDocument::find($id);
        // $document->active_status = 0;
        // $results = $document->update();

        // if ($document->previous_id) {
        //     $previous_doc = PatientDocument::find($document->previous_id);
        //     $previous_doc->active_status = 1;
        //     $previous_doc->update();
        // }

        // ActivityLog::updateDocumentLog('deleted document',  $document->id);

        // if ($results) {
        //     return redirect()->back()->with('message-success-delete', 'Document has been deleted successfully');
        // } else {
        //     return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
        // }

        
            // $employee = ErpPatient::find($id);
            // $employee->active_status = 0;
    
            // $results = $employee->update();
            // if ($results) {
            //     return redirect()->back()->with('message-success-delete', 'Patient has been deleted successfully');
            // } else {
            //     return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
            // }
    
            $employee = PatientDocument::find($id);
            $employee->active_status = 0;
    
            $results = $employee->update();
            
            if ($results) {
                return redirect()->back()->with('message-success-delete', 'Patient has been deleted successfully');
            } else {
                return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
            }
        
    }

    public function checkedOut($id)
    {
        // $module = 'checkedOutLink';
        // return view('backEnd.patients.checkedOutModal', compact('id', 'module'));

        $document = PatientDocument::find($id);
        $document->check_in_out = 0;
        $document->check_in_out_user_id = Auth::user()->id;

        $results = $document->update();

        ActivityLog::updateDocumentLog('document Checked Out',  $document->id);

        $document = PatientDocument::find($id);
        $file = $document->upload_document;
        $pathToFile = public_path() . $file;

        return Response::download($pathToFile);
    }


    public function checkedOutLink($id)
    {
        $document = PatientDocument::find($id);
        $document->check_in_out = 0;
        $document->check_in_out_user_id = Auth::user()->id;

        $results = $document->update();

        $document = PatientDocument::find($id);
        $file = $document->upload_document;
        $path = $file;



        ActivityLog::updateDocumentLog('document Checked Out',  $document->id);

        if ($results) {
            return redirect()->back()->with('message-success-checkedOut', 'Document has been Checked Out successfully')->with('path', $path);
        } else {
            return redirect()->back()->with('message-danger-checkedOut', 'Something went wrong, please try again')->with('path', $path);
        }
    }

    public function checkedIn($id)
    {
        $module = 'checkedInLink';
        return view('backEnd.patients.checkedInModal', compact('id', 'module'));
    }


    public function checkedInLink($id)
    {
        $document = PatientDocument::find($id);
        $document->check_in_out = 1;
        $document->check_in_out_user_id = Auth::user()->id;

        $results = $document->update();

        $type = 0;

        ActivityLog::updateDocumentLog('document Checked In',  $document->id);

        if ($results) {
            return redirect('document/edit/' . $id)->with('message-success-checkedIn', 'Document has been Checked In successfully')->with('type', $type);
            //return redirect()->back()->with('message-success-checkedIn', 'Document has been Checked In successfully')->with('type',$type);
        } else {
            return redirect('document/edit/' . $id)->with('message-danger-checkedIn', 'Something went wrong, please try again')->with('type', $type);;
        }
    }

    public function previousVersions($doc_id)
    {
        // $previousVersionss = PatientDocumentVersion::select('*')->where('doc_id','=', $doc_id)->get();


        $previousVersionss = DB::table('patient_document_versions')
            ->leftjoin('erp_document_types', 'patient_document_versions.doc_type', '=', 'erp_document_types.id')
            ->leftjoin('erp_specialities', 'patient_document_versions.speciality', '=', 'erp_specialities.id')
            ->select('patient_document_versions.*', 'erp_specialities.name' , 'erp_document_types.type_name' , 'erp_document_types.type_code' )
            ->where('patient_document_versions.doc_id', $doc_id)
            ->get();


        // echo count($previousVersionss);exit;

        return view('backEnd.patients.previousVersions', compact('previousVersionss'));
    }


    public function documentPdf($id)
    {


        // $document = PatientDocument::find($id);
        // $file = $document->upload_document;
        // $pathToFile = public_path().$file;

        // return Response::file($pathToFile);

        $documentUrl = PatientDocument::select('upload_document', 'file_type')->where('id', '=', $id)->first();
        return view('backEnd.patients.documentPreview', compact('documentUrl'));
    }

    public function generatePDF($id)
    {
        $document = PatientDocument::find($id);
        $file = $document->upload_document;
        $pathToFile = public_path() . $file;

        return Response::download($pathToFile);
    }

    public function patient_demog($id)
    {
        $data = ErpPatient::where('id', '=', $id)->first();
        $result = [
            'patient_id' => $data->patient_id,
            'title' => $data->title,
            'first_name' => $data->first_name,
            'middle_name' => $data->last_name,
            'sur_name' => $data->sur_name,
            'behaviour' => $data->behaviour,
            'date_of_birth' => date('Y-m-d', strtotime($data->date_of_birth)),
            'nhs_no' => $data->nhs_no,
            'mobile' => $data->mobile,
            'post_code' => $data->post_code,
            'address' => $data->address,
            'gp_details' => $data->gp_details,
            'next_of_kin' => $data->next_of_kin,
        ];
        //$data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('backEnd.patients.patient_demog', $result);

        return $pdf->download('patient_demographic.pdf');
    }

    public function support_plan($id)
    {
        $data = ErpPatient::where('id', '=', $id)->first();
        $support_plans = ErpSupportPlan::all();
        $result = [
            'patient_id' => $data->patient_id,
            'title' => $data->title,
            'first_name' => $data->first_name,
            'middle_name' => $data->last_name,
            'sur_name' => $data->sur_name,
            'behaviour' => $data->behaviour,
            'date_of_birth' => date('Y-m-d', strtotime($data->date_of_birth)),
            'nhs_no' => $data->nhs_no,
            'mobile' => $data->mobile,
            'post_code' => $data->post_code,
            'support_plan' => $data->support_plan,
            'address' => $data->address,
            'gp_details' => $data->gp_details,
            'next_of_kin' => $data->next_of_kin,
        ];
        //$data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('backEnd.patients.support_plan', compact('result', 'support_plans'));

        return $pdf->download('support_plan.pdf');
    }

    public function full_patients_details($id)
    {

        $data = ErpPatient::where('id', '=', $id)->first();
        $support_plans = ErpSupportPlan::all();
        $result = [
            'patient_id' => $data->patient_id,
            'title' => $data->title,
            'first_name' => $data->first_name,
            'middle_name' => $data->last_name,
            'sur_name' => $data->sur_name,
            'behaviour' => $data->behaviour,
            'date_of_birth' => date('Y-m-d', strtotime($data->date_of_birth)),
            'nhs_no' => $data->nhs_no,
            'mobile' => $data->mobile,
            'post_code' => $data->post_code,
            'support_plan' => $data->support_plan,
            'address' => $data->address,
            'gp_details' => $data->gp_details,
            'next_of_kin' => $data->next_of_kin,
            'behaviour' => $data->behaviour,
            'communication' => $data->communication,
            'daily_living_skills' => $data->daily_living_skills,
            'education' => $data->education,
        ];
        //$data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('backEnd.patients.full_patients_details', compact('result', 'support_plans'));

        return $pdf->download('full_patients_details.pdf');
    }

    public function getDocTypeCode()
    {
        $doc_type = $_POST['doc_type'];
    
        $result = ErpDocumentType::select('type_code')->where('id', '=', $doc_type)->first();
       
        if (isset($result)) {
            echo $result->type_code;
        }
      
    }

    public function doc_preview($id)
    {
        $patient = ErpPatient::find($id);
        $specalitys = ErpSpeciality::all();
        $consultants = ErpConsultant::all();
        $doc_types = ErpDocumentType::all();
        $app_types = AppTypes::all();
        $user = user::all();
        $editData = PatientDocument::find($id);
        //$allComments = ErpSendDoc::find($id);

        $allComments = DB::table('erp_send_docs')
            ->leftjoin('users as a', 'erp_send_docs.sender_id', '=', 'a.id')
            ->leftjoin('users as b', 'erp_send_docs.receiver_id', '=', 'b.id')
            ->select('erp_send_docs.*', 'a.name as sender_name', 'b.name as receiver_name')
            ->where('erp_send_docs.doc_id', $id)
            ->get();

        //$documentUrl = PatientDocument::select('upload_document', 'file_type')->where('id','=', $id)->first();
        return view('backEnd.patients.docPreview', compact('user', 'editData', 'patient', 'specalitys', 'consultants', 'doc_types', 'allComments','app_types'));
    }


    public function send_email($id, Request $request)
    {

        $request->validate([
            'receiver_id' => 'required',
            'msg' => 'required'
        ]);

        $users_details = User::where('id', '=', $request->receiver_id)->first();

        $email = new ErpSendDoc();

        $email->receiver_id = $request->receiver_id;
        $email->sender_id = Auth::user()->id;
        $email->doc_id = $id;
        $email->msg = $request->msg;
        $result = $email->save();

        if ($result) {
            $mailData = array(
                'email' => $users_details->email,
                'receiver_id' => $request->receiver_id,
            );
            $mailSent = Mail::to($users_details->email)
                ->send(new SendEmailToUser($mailData));
            if ($mailSent) {

                return redirect('preview_doc/' . $id)->with('message-success', 'Document has been send successfully');
            } else {
                return redirect('preview_doc/' . $id)->with('message-success', 'Document has been send successfully');
            }
        }
    }


    public function allDocumentMsg()
    {
        $user_id = Auth::user()->id;
        // $patient = ErpPatient::find($id);
        //$documents = PatientDocument::where('active_status', 1)->get();
        $documents = DB::table('erp_send_docs')
            ->leftjoin('patient_documents', 'erp_send_docs.doc_id', '=', 'patient_documents.id')
            ->leftjoin('erp_document_types', 'patient_documents.doc_type', '=', 'erp_document_types.id')
            ->leftjoin('erp_specialities', 'patient_documents.speciality', '=', 'erp_specialities.id')
           
            ->select('patient_documents.*', 'erp_specialities.name', 'erp_document_types.type_name')
            ->where('erp_send_docs.receiver_id', $user_id)
            ->get();

        return view('backEnd.patients.allDocumentMsg', compact('documents'));
    }
}
