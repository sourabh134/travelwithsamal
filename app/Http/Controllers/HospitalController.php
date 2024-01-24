<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Specialization;
use App\Models\Treatmeant;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Hospital;
use App\Models\Hosp_image;
class HospitalController extends Controller
{
    public function hospital(Request $request){
        $data['title'] = "Hospital";
        $data['treatmeant'] = Treatmeant::where('status',1)->get();
        $data['hospital']= Hospital::whereNot('status',2)->get();
        return view('admin/hospital',$data);
    }

    public function addHospital(Request $request){        
        $data['years'] = range(date('Y'), 1900);
        $data['title'] = "Hospital";
        $data['specialization'] = Specialization::where('status',1)->get();
        $data['treatmeant'] = Treatmeant::where('status',1)->get();
        $data['country'] = Country::all();
        $data['state'] = State::all();
        $data['city'] = City::all();
        $id = base64_decode($request->key);
        $data['image']=Hosp_image::where('hosp_id',$id)->where('status',1)->get();
        $data['data'] = Hospital::find($id);
        return view('admin/addHospital',$data);
    }
    public function getState(Request $request){
        $country_id = $request->country_id;
        $state = State::where('country_id',$country_id)->get();
        foreach($state as $value){
            echo "<option value='".$value->id."'>".$value->name."</option>";
        }
    }
    public function getCity(Request $request){
        $state_id = $request->state_id;
        $city = City::where('state_id',$state_id)->get();
        foreach($city as $value){
            echo "<option value='".$value->id."'>".$value->name."</option>";
        }
    }

    public function insert_hospital(Request $request){
        if($request->id==""){
            $check_name = Hospital::where('hosp_name',$request->name)->count();
            if($check_name==0){

                $hosp_table = new Hospital;
                $hosp_table->hosp_name = $request->name;
                $hosp_table->hosp_established = $request->established;
                $hosp_table->specialityId = implode(',', $request->specialityId);
                $hosp_table->treatment_id = implode(',',$request->treatmeant);
                $hosp_table->hosp_email = $request->email;
                $hosp_table->hosp_password = $request->password;
                $hosp_table->country_id = $request->country;
                $hosp_table->state_id = $request->state;
                $hosp_table->city = $request->city;
                $hosp_table->hosp_address = $request->address;
                $hosp_table->hosp_description = $request->description;
                $hosp_table->hosp_about = $request->abouts;
                $hosp_table->hosp_infrastructure = $request->infrastructures;
                $hosp_table->save();

                $image_count=count($request->hosp_image);
                for($i=0;$i<$image_count;$i++)
                {
                    $imageName = time().'.'.$request->hosp_image[$i]->extension();      
                    $request->hosp_image[$i]->move(public_path('images/hospital'), $imageName);

                    $hosp_image_table=new Hosp_image;
                    $hosp_image_table->hosp_id=$hosp_table->id;
                    $hosp_image_table->hosp_image=$imageName;
                    $hosp_image_table->save();

                }
                
                echo "done";
            }else{
                echo 2;
            }
        }else{            
            $check_name = Hospital::where('name',$request->name)->where('id',$request->id);
            if($check_name->count() >= 1 && $request->id != $check_name->first()->id){
                echo 2;
            }else{
                $hosp_table = Hospital::find($request->id);
                $hosp_table->hosp_name = $request->name;
                $hosp_table->hosp_established = $request->established;
                $hosp_table->specialityId = implode(',', $request->specialityId);
                $hosp_table->treatment_id = implode(',',$request->treatmeant);
                $hosp_table->hosp_email = $request->email;
                $hosp_table->hosp_password = $request->password;
                $hosp_table->country_id = $request->country;
                $hosp_table->state_id = $request->state;
                $hosp_table->city = $request->city;
                $hosp_table->hosp_address = $request->address;
                $hosp_table->hosp_description = $request->description;
                $hosp_table->hosp_about = $request->abouts;
                $hosp_table->hosp_infrastructure = $request->infrastructures;
                $hosp_table->save();

                if($request->hosp_image!=''){
                $image_count=count($request->hosp_image);
                for($i=0;$i<$image_count;$i++)
                {
                    $imageName = time().'.'.$request->hosp_image[$i]->extension();      
                    $request->hosp_image[$i]->move(public_path('images/hospital'), $imageName);

                    $hosp_image_table=new Hosp_image;
                    $hosp_image_table->hosp_id=$request->id;
                    $hosp_image_table->hosp_image=$imageName;
                    $hosp_image_table->save();
                }
            }
                echo "udone";
                
            }            
        }
        
    }
    public function delete_hospital(Request $request){
        $id = $request->id;
        $hosp = Hospital::find($id);
        $hosp->status = 2;
        $hosp->save();
    }
    public function hosp_status(Request $request){
        $key=base64_decode($request->key);
        $hosp = Hospital::find($key);
        if($hosp->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $hosp->status = $status;
        $hosp->save();
        return redirect()->back()->with('success','Hospital Status Changed');
    }
    public function hospitalDetail(Request $request){
        $id=base64_decode($request->key);
        $data['treatmeant'] = Treatmeant::where('status',1)->get();
        $data['title']="Hospital Detail";
        $data['hosp']=DB::table('hospitals as hosp')
                    ->select('hosp.*','country.id as country_id','country.name as county_name','state.id as state_id','state.name as state_name','city.id as city_id','city.name as city_name','treat.id as treatment_id','treat.name as treatment_name')
                    ->join('countries as country','country.id','=','hosp.country_id')
                    ->join('states as state','state.id','=','hosp.state_id')
                    ->join('cities as city','city.id','=','hosp.city')
                    ->join('treatmeants as treat','treat.id','=','hosp.treatment_id')
                    ->where('hosp.id',$id)->first();
        $data['hosp_image']=Hosp_image::where('hosp_id',$id)->where('status',1)->get();
        return view('admin.hospitalDetail',$data);
    }
    public function delete_hospitalImage(Request $request){
        $id = $request->id;
        $hosp = Hosp_image::find($id);
        $hosp->status = 2;
        $hosp->save();
        echo "done";


    }
}
