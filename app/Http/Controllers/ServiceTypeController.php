<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Admin;
use App\Models\Category;
use App\Models\ServiceType;

class ServiceTypeController extends Controller
{
    public function serviceType(){
        $admin_id = Session::get('id');
        $data['title'] = "Service Type";
        $data['admin']=Admin::find($admin_id);
        $data['data'] = ServiceType::where('status','!=',2)->get();
        return view('admin.servicetype',$data);
    }
    public function addserviceType(Request $request){
        $admin_id = Session::get('id');
        $data['title'] = "Service Type";
        $data['admin']=Admin::find($admin_id);
        $id = base64_decode($request->key);
        $data['data'] = ServiceType::find($id);
        return view('admin.addServiceType',$data);
    }

    public function insert_serviceType(Request $request){
        if($request->id==""){
            $check_name = ServiceType::where('name',$request->name)->count();
            if($check_name==0){                
                $serviceType = new ServiceType;
                $serviceType->name = $request->name;
                $serviceType->status = 1;
                $serviceType->save();
                echo 1;
            }else{
                echo 2;
            }              
        }else{
           $check_name = ServiceType::where('name',$request->name)->count();
            if($check_name==0){                
                $serviceType = new ServiceType;
                $serviceType = ServiceType::find($request->id);
                $serviceType->name = $request->name;
                $serviceType->save();
                echo 1;
            }else{
                echo 2;
            }             

        }
    }
    public function delete_serviceType(Request $request){
        $id = $request->id;
        $serviceType = ServiceType::find($id);
        $serviceType->status = 2;
        $serviceType->save();
    }

    public function change_servicetype_status(Request $request){
        $id = $request->id;
        $status = $request->status;
        $serviceType = ServiceType::find($id);
        $serviceType->status = $status;
        $serviceType->save();
    }
}
