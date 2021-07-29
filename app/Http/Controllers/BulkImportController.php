<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BulkImport;
use Maatwebsite\Excel\Facades\Excel;
class BulkImportController extends Controller
{
   public function addBulk()
   {
       return view('backEnd.bulk.create');
   }

   public function storeBulk(Request $request)
   {
    
    if ($request->hasFile('upload_file')) {
        
        Excel::import(new BulkImport,request()->file('upload_file'));
 
            return redirect()->back()->with('message-success', 'Upload  Recorded successfully.');
        }
   }
}
