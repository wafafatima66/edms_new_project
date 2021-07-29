<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Carbon;
use App\PatientDocument;
class BulkImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if ($row[0] != "Doc type") {
           
            $document = new PatientDocument();
            $document->doc_type = $row[0];
            $document->patient_id = (int)$row[1];
            $document->patient_nhs = $row[2];
            $document->patient_d_f_b = $this->dateFormate($row[3]);
            $document->document_type_code = $row[4];
            $document->document_name = $row[5];
            $document->upload_document = '/uploads/documents/'.$row[6];
            $document->file_type = $row[7];
            $document->speciality = $row[8];
            $document->consultant = $row[9];
            $document->owner = $row[10];
            $document->created_date = $this->dateFormate($row[11]);
            $document->document_date = $this->dateFormate($row[12]);
            $document->version_no = 1.1;
            $result = $document->save();
           
        }
    }


    public function dateFormate($date)
    {
        if(is_numeric($date))
        {
            $UNIX_DATE = ($date - 25569) * 86400;
            $date_column = gmdate("Y-m-d", $UNIX_DATE);
            return $date_column;
        }
    }
}
