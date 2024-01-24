<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patientcontact;

class PatientContactController extends Controller
{
    public function patientContact(){
        $data['title']="Contact Inquiries";
        $data['contact']=Patientcontact::whereNot('status',2)->get();
        return view('admin/patientcontact',$data);
    }
    public function patientcontact_status(Request $request){
        $key=base64_decode($request->key);
        $hosp = Patientcontact::find($key);
        if($hosp->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $hosp->status = $status;
        $hosp->save();
        return redirect()->back()->with('success','Contact inquiries Status Changed');
    }
    public function delete_patientcontact(Request $request){
        $id = $request->id;
        $hosp = Patientcontact::find($id);
        $hosp->status = 2;
        $hosp->save();
    }
    public function patientcontactDetail(Request $request){
        $id=base64_decode($request->key);
        $data['title']="Contact Inquiries Detail";
        $data['contact']=Patientcontact::find($id);
        return view('admin/patientcontactDetail',$data);
    }
}
