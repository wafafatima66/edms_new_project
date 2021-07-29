<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDocumentVersion extends Model
{
    public function patient(){
		return $this->belongsTo('App\ErpPatient', 'patient_id', 'id');
	}
}
