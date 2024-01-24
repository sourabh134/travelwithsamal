<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\Country;
use App\Models\Hospital;

class DoctorController extends Controller
{
    public function doctors(){
        $data['title'] = "Doctor";
        $data['doctor']= Doctor::whereNot('status',2)->get();
        return view('admin/doctor',$data);
    }
    public function addDoctor(Request $request){
        $data['title'] = "Doctor";
        $id=base64_decode($request->key);
        $data['specialization'] = Specialization::where('status',1)->get();
        $data['hospital']= Hospital::where('status','!=',2)->get();
        $data['country'] = Country::all();
        $data['data']=Doctor::find($id);
        return view('admin/addDoctor',$data);
    }
    public function insert_doctor(Request $request){
        if($request->id==""){
            $check_name = Doctor::where('doc_name',$request->name)->count();
            if($check_name==0){
                $imageName = time().'.'.$request->doc_image->extension();      
                $request->doc_image->move(public_path('images/doctor'), $imageName);

                $doc_table = new Doctor; 
                $doc_table->doc_name = $request->name;
                $doc_table->hosp_id = $request->hospital_id;
                $doc_table->speciality_id = implode(',', $request->specialityId);
                $doc_table->doc_email = $request->email;
                $doc_table->doc_password = $request->password;
                $doc_table->doc_image = $imageName;
                $doc_table->doc_number = $request->number;
                $doc_table->Nationality = $request->country;
                $doc_table->address = $request->address;
                $doc_table->designation = $request->desigantion;
                $doc_table->about = $request->abouts;
                $doc_table->experience = $request->experience;
                $doc_table->present_working = $request->working;
                $doc_table->save();
                echo "done";
            }else{
                echo 2;
            }
        }else{            
            $check_name = Doctor::where('doc_name',$request->name)->where('id',$request->id);
            if($check_name->count() >= 1 && $request->id != $check_name->first()->id){
                echo 2;
            }else{
               
                if($request->doc_image !='')
                {
                    $imageName = time().'.'.$request->doc_image->extension();      
                    $request->doc_image->move(public_path('images/doctor'), $imageName);    
                }
                else
                {
                    $imageName=$request->old_image;
                }
                

                $doc_table = Doctor::find($request->id);
                $doc_table->doc_name = $request->name;
                $doc_table->hosp_id = $request->hospital_id;
                $doc_table->speciality_id = implode(',', $request->specialityId);
                $doc_table->doc_email = $request->email;
                $doc_table->doc_password = $request->password;
                $doc_table->doc_image = $imageName;
                $doc_table->doc_number = $request->number;
                $doc_table->Nationality = $request->country;
                $doc_table->address = $request->address;
                $doc_table->designation = $request->desigantion;
                $doc_table->about = $request->abouts;
                $doc_table->experience = $request->experience;
                $doc_table->present_working = $request->working;
                $doc_table->save();
                echo "udone";
                
            }            
        }
    }
    public function doctor_status(Request $request){
        $key=base64_decode($request->key);
        $hosp = Doctor::find($key);
        if($hosp->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $hosp->status = $status;
        $hosp->save();
        return redirect()->back()->with('success','Doctor Status Changed');

    }
    public function delete_doctor(Request $request){
        $id = $request->id;
        $hosp = Doctor::find($id);
        $hosp->status = 2;
        $hosp->save();
    }
    public function doctorDetail(Request $request){
        $id=base64_decode($request->key);
        $data['title']="Doctor Detail";

        $data['doctor']=DB::table('doctors as doc')
                    ->select('doc.*','hosp.id as hospital_id','hosp.hosp_name','country.id as country_id','country.name as county_name')
                    ->join('hospitals as hosp','hosp.id','=','doc.hosp_id')
                    ->join('countries as country','country.id','=','doc.Nationality')
                    ->where('doc.id',$id)->first();
        $data['specialization']=Specialization::all();
        return view('admin.doctorDetail',$data);
    }
}
