<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function specialization(Request $request){
        $data['title'] = "Specialization";
        $data['specialization'] = Specialization::where('status',1)->get();
        return view('admin/specialization',$data);
    }

    public function addSpecialization(Request $request){
        $data['title'] = "Specialization";
        $id = base64_decode($request->key);
        $data['data'] = Specialization::find($id);
        return view('admin/addSpecialization',$data);
    }

    public function insert_specialization(Request $request){
        if($request->id==""){
            $check_name = Specialization::where('name',$request->name)->count();
            if($check_name==0){
                //image upload
                $imageName = time().'.'.$request->image->extension();      
                $request->image->move(public_path('images'), $imageName);
                $specialization = new Specialization;
                $specialization->name = $request->name;
                $specialization->description = $request->descriptions;
                $specialization->image = $imageName;
                $specialization->status = 1;
                $specialization->save();
                echo 1;
            }else{
                echo 2;
            }
        }else{
            
            $check_name = Specialization::where('name',$request->name)->where('id',$request->id);
            if($check_name->count() >= 1 && $request->id != $check_name->first()->id){
                echo 2;
            }else{
                if($request->image!=''){
                    $imageName = time().'.'.$request->image->extension();      
                    $request->image->move(public_path('images'), $imageName);
                }else{
                    $imageName = '';
                }
                $specialization = new Specialization;
                $specialization = Specialization::find($request->id);
                $specialization->name = $request->name;
                $specialization->description = $request->descriptions;
                if($imageName!=''){
                    $specialization->image = $imageName;
                }                
                $specialization->save();
                echo 1;
            }            
        }
        
    }
    public function delete_specialization(Request $request){
        $id = $request->id;
        $specialization = Specialization::find($id);
        $specialization->status = 2;
        $specialization->save();
    }
}
