<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function patients(){
        $data['title']="Patients";
        $data['patients']=User::whereNot('status',2)->get();
        return view('admin/patient',$data);
    }
    public function patientsDetail(Request $request){
        $id=base64_decode($request->key);
        $data['title']="Patients Detail";
        $data['user']=User::find($id);
        return view('admin/patientsDetail',$data);
    }
    public function patients_status(Request $request){
        $id=base64_decode($request->key);
        $patient = User::find($id);
        if($patient->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $patient->status = $status;
        $patient->save();
        return redirect()->back()->with('success','Patients Status Changed');
    }
    public function delete_patient(Request $request){
        $id = $request->id;
        $hosp = User::find($id);
        $hosp->status = 2;
        $hosp->save();
    }
}
