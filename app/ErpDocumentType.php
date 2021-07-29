<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class ErpDocumentType extends Model
{
	protected $table = 'erp_document_types';


    public function docs(){
		return $this->hasMany('App\PatientDocument', 'doc_type', 'id')->where('active_status','1');
	}

	public function patient_docs(){
		$patient_id = Session::get('patient_id');

		//echo $patient_id; exit;

		return $this->hasMany('App\PatientDocument', 'doc_type', 'id')->where('active_status','1');
	}

	public static function patient_doc_type_counting($patient_user_define_id, $doc_type){

	  $all_docs = PatientDocument::query()
                ->from('patient_documents as d')
                // ->leftjoin('dtb_projects as p','up.project_id', '=', 'p.id')
                ->where('d.patient_id', $patient_user_define_id)
                ->where('d.doc_type', $doc_type)
                ->get([ 'd.*' ]);
            
        
        return $all_docs;
  
	}

	
}
