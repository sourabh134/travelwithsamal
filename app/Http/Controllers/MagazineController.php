<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Magazine;
use App\Models\Admin;

class MagazineController extends Controller
{
    public function magazine(){
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        $data['title'] = "Magazine";
        $data['data'] = Magazine::where('status','!=',2)->get();
        return view('admin.magazine', $data);
    }

    public function addMagazine(Request $request){
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        $data['title'] = "Magazine";
        $id = base64_decode($request->key);
        $data['data'] = Magazine::find($id);
        return view('admin.addmagazine', $data);
    }

    public function insert_magazine(Request $request){
        if($request->id==""){
            //image upload                
            $imageName1 = time().'.'.$request->images->extension();      
            $request->images->move(public_path('images'), $imageName1);
            $magazine = new Magazine;
            $magazine->heading = $request->heading;
            $magazine->image = $imageName1;
            $magazine->description = $request->info;
            $magazine->videourl = $request->videourl;
            $magazine->postedBy = $request->postedBy;
            $magazine->postedDate = $request->postedDate;
            $magazine->type = $request->type;
            $magazine->home = 0;
            $magazine->position = 0;
            $magazine->status = 1;                
            $magazine->save();               
            echo 1;
                        
        }else{  
            if($request->images!=''){
                $imageName1 = time().'.'.$request->images->extension();      
                $request->images->move(public_path('images'), $imageName1);
            }else{
                $imageName1 = '';
            }
            $magazine = new Magazine;
            $magazine = Magazine::find($request->id);
            $magazine->heading = $request->heading;
            $magazine->description = $request->info;
            $magazine->videourl = $request->videourl;
            $magazine->postedBy = $request->postedBy;
            $magazine->postedDate = $request->postedDate;
            $magazine->type = $request->type;
            if($imageName1!=''){
                $magazine->image = $imageName1;
            }
            $magazine->save();                     
            echo 1;
        }
    }

    public function delete_magazine(Request $request){
        $id = $request->id;
        $category = Magazine::find($id);
        $category->status = 2;
        $category->save();
    }
    public function change_magazine_status(Request $request){
        $id = $request->id;
        $status = $request->status;
        $category = Magazine::find($id);
        $category->status = $status;
        $category->save();
    }
    public function addhomemagazine(Request $request){
        $id = $request->id;
        $status = $request->status;
        $category = Magazine::find($id);
        $category->home = $status;
        $category->save();
    }
    public function addbannermagazine(Request $request){
        $id = $request->id;
        $status = $request->status;
        $category = Magazine::find($id);
        $category->banner = $status;
        $category->save();
    }
}
