<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Destination;
use App\Models\DestinationImage;
use Session;

class DestinationController extends Controller
{
    public function destination(Request $request){
        $admin_id = session::get('id');
        $data['data']=Destination::where('status','!=',2)->get();
        $data['admin']=Admin::find($admin_id);
        return view('admin.destination', $data);
    }

    public function addDistination(Request $request){
        if($request->id){
            $data['data']=Destination::find(base64_decode($request->id));
        }
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        return view('admin.adddestination', $data);
    }

    public function insertdestination(Request $request){
        
        if($request->banner_id!=''){
            $banner = Destination::find($request->banner_id);
            $banner->heading = $request->heading;
            $banner->subheading = $request->subheading;
            $banner->discription = $request->discription;
            $banner->update();
            echo "update";
            // return redirect()->back()->with('message', 'Banner updated successfully.');
        }
    }
    public function destinationimage(Request $request){
        $admin_id = session::get('id');
        $data['data']=DestinationImage::where('status','!=',2)->get();
        $data['admin']=Admin::find($admin_id);
        return view('admin.destinationimage', $data);
    }

    public function adddestinationimage(Request $request){
        if($request->id){
            $data['data']=DestinationImage::find(base64_decode($request->id));
        }
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        return view('admin.adddestinationimage', $data);
    }

    public function insertdestinationimage(Request $request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move('public/img/destination', $filename);
            $imageName = $filename;
        }else{
            if($request->banner_id){
                $imageName = "";
            }
        }
        if($request->banner_id!=''){
            $banner = DestinationImage::find($request->banner_id);
            if($imageName!=''){
                $banner->image = $imageName;
            }            
            $banner->name = $request->name;
            $banner->update();
            echo "update";
            // return redirect()->back()->with('message', 'Banner updated successfully.');
        }else{
            $banner = new DestinationImage;
            $banner->image = $imageName;
            $banner->name = $request->name;
            $banner->save();
            echo "add";
            // return redirect()->back()->with('message', 'Banner added successfully.');
        }
    }
}
