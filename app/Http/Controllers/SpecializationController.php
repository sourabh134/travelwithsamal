<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function specialization(Request $request){
        $data['title'] = "Specialization";
        return view('admin/specialization',$data);
    }

    public function addSpecialization(Request $request){
        $data['title'] = "Specialization";
        return view('admin/addSpecialization',$data);
    }

    public function insert_specialization(Request $request){
        // print_r($request);
        // die;
        $check_name = Specialization::where('name',$request->name)->count();
        if($check_name==0){
            //image upload
            $imageName = time().'.'.$request->image->extension();      
            $request->image->move(public_path('images'), $imageName);
            $specialization = new Specialization;
            $specialization->name = $request->name;
            $specialization->description = $request->description;
            $specialization->image = $imageName;
            $specialization->status = 0;
            $specialization->save();
            echo 1;

        }else{
            echo 2;
        }
    }
}
