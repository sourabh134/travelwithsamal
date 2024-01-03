<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Treatmeant;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class HospitalController extends Controller
{
    public function hospital(Request $request){
        $data['title'] = "Hospital";
        $data['treatmeant'] = Treatmeant::where('status',1)->get();
        return view('admin/hospital',$data);
    }

    public function addHospital(Request $request){        
        $data['years'] = range(date('Y'), 1900);
        $data['title'] = "Hospital";
        $data['specialization'] = Specialization::where('status',1)->get();
        $data['treatmeant'] = Treatmeant::where('status',1)->get();
        $data['country'] = Country::all();
        $id = base64_decode($request->key);
        $data['data'] = Treatmeant::find($id);
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

    public function insert_treatmeants(Request $request){
        if($request->id==""){
            $check_name = Treatmeant::where('name',$request->name)->count();
            if($check_name==0){
                //image upload
                $imageName = time().'.'.$request->image->extension();      
                $request->image->move(public_path('images'), $imageName);
                $treatmeant = new Treatmeant;
                $treatmeant->specialityId = $request->specialityId;
                $treatmeant->name = $request->name;
                $treatmeant->description = $request->descriptions;
                $treatmeant->content = $request->abouts;
                $treatmeant->image = $imageName;
                $treatmeant->status = 1;
                $treatmeant->save();
                echo 1;
            }else{
                echo 2;
            }
        }else{            
            $check_name = Treatmeant::where('name',$request->name)->where('id',$request->id);
            if($check_name->count() >= 1 && $request->id != $check_name->first()->id){
                echo 2;
            }else{
                if($request->image!=''){
                    $imageName = time().'.'.$request->image->extension();      
                    $request->image->move(public_path('images'), $imageName);
                }else{
                    $imageName = '';
                }
                $treatmeant = new Treatmeant;
                $treatmeant = Treatmeant::find($request->id);
                $treatmeant->specialityId = $request->specialityId;
                $treatmeant->name = $request->name;
                $treatmeant->description = $request->descriptions;
                $treatmeant->content = $request->abouts;
                if($imageName!=''){
                    $treatmeant->image = $imageName;
                }                
                $treatmeant->save();
                echo 1;
            }            
        }
        
    }
    public function delete_treatmeants(Request $request){
        $id = $request->id;
        $treatmeant = Treatmeant::find($id);
        $treatmeant->status = 2;
        $treatmeant->save();
    }
}
