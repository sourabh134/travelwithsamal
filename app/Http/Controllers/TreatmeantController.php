<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Treatmeant;

class TreatmeantController extends Controller
{
    public function treatmeants(Request $request){
        $data['title'] = "Treatmeants";
        $data['treatmeant'] = Treatmeant::whereNot('status',2)->get();
        return view('admin/treatmeant',$data);
    }

    public function addTreatmeants(Request $request){
        $data['title'] = "Treatmeants";
        $data['specialization'] = Specialization::where('status',1)->get();
        $id = base64_decode($request->key);
        $data['data'] = Treatmeant::find($id);
        return view('admin/addTreatmeant',$data);
    }

    public function insert_treatmeants(Request $request){
        if($request->id==""){
            $check_name = Treatmeant::where('name',$request->name)->count();
            if($check_name==0){
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
    public function treatmeant_status(Request $request){
         $id=base64_decode($request->key);
        $specialization = Treatmeant::find($id);
        if($specialization->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $specialization->status = $status;
        $specialization->save();
        return redirect()->back()->with('success','Treatmeant Status Changed');
    }
}
