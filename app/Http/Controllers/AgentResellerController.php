<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Banner;
use App\Models\WelcomeImage;
use App\Models\AgentBanner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Agent;
use App\Models\AgentBrand;
use App\Models\ServiceType;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\AgentBranch;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Redirect;
use Illuminate\Validation\ValidationException;

class AgentResellerController extends Controller
{
    public function agentBanners(Request $request){
        $admin_id = session::get('id');
        $data['banners']=AgentBanner::orderBy('position_id', 'asc')->get();
        $data['admin']=Admin::find($admin_id);
        return view('admin.agentbanners', $data);
    }

    public function addAgentBanner(Request $request){
        if($request->id){
            $data['banner']=AgentBanner::find($request->id);
        }
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        return view('admin.addAgentBanner', $data);
    }

    public function insertAgentBanner(Request $request){
        $validator = Validator::make($request->all(), 
            [
                'image' => 'mimes:jpeg,jpg,png,gif|max:2000|dimensions:max_width=900,max_height=300',
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
            ]
        );
        if ($validator->fails()){
            $errors = $validator->errors();
            echo $errors;
        }else{
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $image->move('public/img/banners', $filename);
                $imageName = $filename;
            }else{
                if($request->banner_id){
                    $imageName = $request->pre_image;
                }
            }
            if($request->banner_id){
                $banner = AgentBanner::find($request->banner_id);
                $banner->image = $imageName;
                $banner->name = $request->name;
                $banner->start_date = $request->start_date;
                $banner->end_date = $request->end_date;
                $banner->update();
                echo "update";
                // return redirect()->back()->with('message', 'Banner updated successfully.');
            }else{
                $banner = new AgentBanner;
                $banner->image = $imageName;
                $banner->name = $request->name;
                $banner->start_date = $request->start_date;
                $banner->end_date = $request->end_date;
                $banner->save();
                echo "add";
                // return redirect()->back()->with('message', 'Banner added successfully.');
            }
        }
        
    }

    public function update_Agentstatus($id, $table){
        $model = 'App\Models\\'.$table;
        $item = $model::find($id);
        if($item->status == 1){ $update=0; }else if($item->status == 0){ $update=1; }
        $model::where('id', $id)->update([ 'status' => $update ]);
        return redirect()->back()->with('message', 'Status changed successfully.');
    }

    public function deleteAgent($id, $table){
        $model = 'App\Models\\'.$table;
        $model::destroy($id);
        // $item = $model::find($id);
        // $item->delete();
        return redirect()->back()->with('message', 'Deleted successfully.');
    }

    public function updateAgentBannerOrder(Request $request){
        $arr=$request->allData;
        $num=0;
        for($i=0;$i<count($arr);$i++)
        {
            $banner = AgentBanner::find($arr[$i]);
            $banner->position_id = $num=$num+1;
            $banner->update();
        } 
    }
    //////////////////////////
    public function agent(){
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        $data['title'] = "Agent/Reseller";
        $data['brand'] = Brand::where('status','!=',2)->get();
        $data['data'] = Agent::where('status','!=',2)->get();
        return view('admin.agent', $data);
    }
    public function addAgent(Request $request){
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        $data['category'] = Category::where('status','!=',2)->get();
        $data['title'] = "Agent/Reseller";
        $id = base64_decode($request->key);
        $data['data'] = Agent::find($id);
        $data['brand'] = Brand::where('status','!=',2)->get();
        $data['agentbrand'] = AgentBrand::where('agentID',$id)->get();
        return view('admin.addagent', $data);
    }

    public function insert_agent(Request $request){        
        if($request->id==""){
            $check_name = Agent::where('name',$request->name)->count();
            if($check_name==0){ 
                //image upload
                $imageName = time().'.'.$request->image->extension();      
                $request->image->move(public_path('images'), $imageName);
                
                $imageName1 = time().'.'.$request->images->extension();      
                $request->images->move(public_path('images'), $imageName1);  

                $agent = new Agent;
                $agent->name = $request->name;
                $agent->logo = $imageName;
                $agent->images = $imageName1;
                $agent->description = $request->info;
                $agent->email = $request->email;
                $agent->contact = $request->mobile;
                $agent->youtube = $request->youtube;
                $agent->twitter = $request->twitter;
                $agent->linkedin = $request->linkedin;
                $agent->facebook = $request->facebook;
                $agent->instagram = $request->instagram;
                $agent->snap_chat = $request->snapchat;
                $agent->type = $request->type;
                $agent->status = 1;
                $agent->save();
                foreach($request->brands as $val){
                    $agentBrand = new AgentBrand;
                    $agentBrand->agentID = $agent->id;
                    $agentBrand->brandID = $val;
                    $agentBrand->save();
                }
                echo 1;
            }else{
                echo 2;
            }              
        }else{
            $check_name = Brand::where('name',$request->name)->where('id',$request->id);
            if($check_name->count() >= 1 && $request->id != $check_name->first()->id){
                echo 2;
            }else{
                if($request->image!=''){
                    $imageName = time().'.'.$request->image->extension();      
                    $request->image->move(public_path('images'), $imageName);
                }else{
                    $imageName = '';
                }  
                
                if($request->images!=''){
                    $imageName1 = time().'.'.$request->images->extension();      
                    $request->images->move(public_path('images'), $imageName1);
                }else{
                    $imageName1 = '';
                }
                $agent = new Agent;
                $agent = Agent::find($request->id);
                $agent->name = $request->name;
                $agent->description = $request->info;
                $agent->email = $request->email;
                $agent->contact = $request->mobile;
                $agent->youtube = $request->youtube;
                $agent->twitter = $request->twitter;
                $agent->linkedin = $request->linkedin;
                $agent->facebook = $request->facebook;
                $agent->instagram = $request->instagram;
                $agent->snap_chat = $request->snapchat;
                $agent->type = $request->type;
                if($imageName!=''){
                    $agent->logo = $imageName;
                }
                if($imageName1!=''){
                    $agent->images = $imageName1;
                }
                $agent->save();
                $brandagent = AgentBrand::select('brandID')->where('agentID',$request->id)->get();
                $brandarray = array();
                foreach($brandagent as $val){
                    array_push($brandarray,$val->brandID);
                }
                $result=array_diff($brandarray,$request->brands);
                foreach($request->brands as $valb){
                    $checkbrandid = AgentBrand::where('brandID',$valb)->where('agentID',$request->id)->count();
                    if($checkbrandid==0){
                        $agentBrand = new AgentBrand;
                        $agentBrand->agentID = $request->id;
                        $agentBrand->brandID = $valb;
                        $agentBrand->save();
                    }                    
                }
                foreach($result as $rval){
                    AgentBrand::where('brandID',$rval)->where('agentID',$request->id)->delete();
                }              
                echo 1;
            }             

        }
    }
    public function delete_agent(Request $request){
        $id = $request->id;
        $category = Agent::find($id);
        $category->status = 2;
        $category->save();
    }
    public function change_agent_status(Request $request){
        $id = $request->id;
        $status = $request->status;
        $category = Agent::find($id);
        $category->status = $status;
        $category->save();
    }
    public function add_popular_agent(Request $request){
        $id = $request->id;
        $status = $request->status;
        $category = Agent::find($id);
        $category->popular = $status;
        $category->save();
    }

    public function popularAgent(Request $request){
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        $data['data'] = Agent::where('status','!=',2)->where('popular',1)->orderBy('position','ASC')->get();
        return view('admin.popularAgents', $data);
    }
    
    public function updateAgentOrder(Request $request){
        $arr=$request->allData;
        $num=0;
        for($i=0;$i<count($arr);$i++)
        {
            $brand = Agent::find($arr[$i]);
            $brand->position = $num=$num+1;
            $brand->update();
        } 
    }

    public function branch(Request $request){
        $data['id'] = $request->key; 
        $admin_id = session::get('id');
        $data['title'] = "Branch";
        $data['data']=AgentBranch::where('agentID', base64_decode($request->key))->get();
        $data['admin']=Admin::find($admin_id);
        
        return view('admin.branch', $data);
    }

    public function addBranch(Request $request){
        $admin_id = session::get('id');
        $data['title'] = "Branch";
        $data['agentid'] = base64_decode($request->key);
        $branchid = base64_decode($request->id);
        $data['admin']=Admin::find($admin_id);
        $data['servicetype'] = ServiceType::where('status',1)->get();
        $data['country'] = Country::all();
        if($branchid!='') {      
        $data['data'] = AgentBranch::where('id',$branchid)->first();
        $data['state'] = State::where('country_id',$data['data']->country)->get();
        $data['city'] = City::where('state_id',$data['data']->state)->get();
        }
        return view('admin.addBranch', $data);
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

    public function insert_branch(Request $request){        
        if($request->id==""){
            $check_name = AgentBranch::where('name',$request->name)->count();
            if($check_name==0){                              
                $insert = new AgentBranch;
                $insert->name = $request->name;
                $insert->agentID = $request->agentid;
                $insert->servicetypeID = $request->servicetypeID;
                $insert->contact = $request->mobile;
                $insert->start_day = $request->start_day;
                $insert->end_day = $request->end_day;
                $insert->start_time = $request->start_time;
                $insert->end_time = $request->end_time;
                $insert->country = $request->country;
                $insert->state = $request->state;
                $insert->city = $request->city;
                $insert->address = $request->address;
                $insert->latitude = 0;
                $insert->longitude = 0;
                $insert->status = 1;
                $insert->save();
                
                echo 1;
            }else{
                echo 2;
            }              
        }else{
            $check_name = AgentBranch::where('name',$request->name)->where('id',$request->id);
            if($check_name->count() >= 1 && $request->id != $check_name->first()->id){
                echo 2;
            }else{
                               
                $insert = new AgentBranch;
                $insert = AgentBranch::find($request->id);
                $insert->name = $request->name;
                $insert->agentID = $request->agentid;
                $insert->servicetypeID = $request->servicetypeID;
                $insert->contact = $request->mobile;
                $insert->start_day = $request->start_day;
                $insert->end_day = $request->end_day;
                $insert->start_time = $request->start_time;
                $insert->end_time = $request->end_time;
                $insert->country = $request->country;
                $insert->state = $request->state;
                $insert->city = $request->city;
                $insert->address = $request->address;
                $insert->latitude = 0;
                $insert->longitude = 0;
                $insert->save();               
                echo 1;
            }             

        }
    }

    public function change_branch_status(Request $request){
        $id = $request->id;
        $status = $request->status;
        $data = AgentBranch::find($id);
        $data->status = $status;
        $data->save();
    }

    public function delete_branch(Request $request){
        $id = $request->id;
        $category = AgentBranch::find($id);
        $category->status = 2;
        $category->save();
    }
}
