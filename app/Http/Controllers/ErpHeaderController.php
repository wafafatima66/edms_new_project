<?php

namespace App\Http\Controllers;

use App\ErpHeader;
use App\user;
use Illuminate\Http\Request;

class ErpHeaderController extends Controller
{
    public function index_header(){
        $head = ErpHeader::find(1);
        $header = $head->header;
        $header_t = $head->header_title;
        $exp_info = $head->exp_info;
        $tel = $head->tel;
        $email = $head->email;
       

        //echo $head->header; exit;
        return view('backEnd.header.edit_header',compact('header','header_t','exp_info','tel','email'));    
    }
    public function edit_header(Request $req){

        $head = ErpHeader::find('1');
        if ($req->hasFile('img')) {
           
            $upload = $req->file('img');
            $upload_name =  time() . $upload->getClientOriginalName();
            $destinationPath = public_path('uploads/icon');
            $upload->move($destinationPath, $upload_name);
            $head->img = 'public/uploads/icon/'.$upload_name;
        }    
        $head->header = $req->get('header');
        $head->header_title = $req->get('header_t');
        $head->exp_info = $req->get('exp_info');
        $head->tel = $req->get('tel');
        $head->email = $req->get('email');
        $result = $head->update();

        session()->flash('header',$req->get('header'));
        session()->flash('header_t', $req->get('header_t'));
        if($result) {
            return redirect('header')->with('message-success', 'Dashboard settings has been updated.');
        } else {
            return redirect('header')->with('message-success', 'Dashboard settings went wrong.');
        }
    }
    
   
}
