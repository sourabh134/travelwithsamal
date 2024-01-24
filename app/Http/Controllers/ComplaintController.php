<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function complaints(){
        $data['title']="Complaint";
        $data['complaint']=Complaint::whereNot('status',2)->get();
        return view('admin/complaint',$data);
    }
    public function complaint_status(Request $request){
        $id=base64_decode($request->key);
        $patient = Complaint::find($id);
        if($patient->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $patient->status = $status;
        $patient->save();
        return redirect()->back()->with('success','Complaint Status Changed');
    }
    public function delete_complaint(Request $request){
        $id = $request->id;
        $hosp = Complaint::find($id);
        $hosp->status = 2;
        $hosp->save();
    }
    public function complaintDetail(Request $request){
        $id=base64_decode($request->key);
        $data['title']="Complaint Detail";
        $data['complaint']=DB::table('complaints as c')
                    ->select('c.*','u.id as userId','u.name','doc.id as doctorId','doc.doc_name')
                    ->join('users as u','u.id','=','c.user_id')
                    ->join('doctors as doc','doc.id','=','c.doctor_id')
                    ->where('c.id',$id)
                    ->first();
        return view('admin/complaintDetail',$data);
    }
}
