<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Banner;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Redirect;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    public function login(){
        return view('admin.login');
    }

    public function admin_login(Request $request){
        $username = $request->username;
        $password = md5($request->password);
        $check = Admin::where('username',$username)->where('password',$password);
        if($check->count()!=0)
        {
            $row= $check->first();
            $adminUser =  $row->username;
            $adminPassword =  $row->password;
            $adminName = $row->name;
            $request->session()->put('adminUser', $adminUser);
            $request->session()->put('adminPassword', $adminPassword);
            $request->session()->put('gearzapp_admin_user_id',$row->id); 
        
          session::put('id',$row->id);
  
          session::put('name',$row->name);
  
          session::put('email',$row->email);
          
          session::put('profile_img',$row->profile_img);

          session::put('password', $row->password);
        //  dd(session('id'));
          Session::flash('message', 'You are logged in successfully.');
          return redirect('/admin/dashboard');
        }
        else{   
            //dd(session('id'));
          Session::flash('message','Wrong username or password.');
          return redirect('/admin');
        }

    }

    public function dashboard()
    {
        $admin_id = session::get('id');
        if($admin_id == "" || $admin_id == null){
            // $request->session()->flush();
            session::flush();
            return redirect('/admin');
        }else{
            $data['admin']=Admin::find($admin_id);
            return view('admin.dashboard', $data);
        }
    }

    public function logout(){
        session::flush();
        return redirect('/admin');
    }

    public function profile($admin_id){
        $adminId = base64_decode($admin_id);
        $data['admin']=Admin::find($adminId);
        return view('admin.profile', $data);
    }
    public function update_profile(Request $request){
        // print_r($request->all());die;
        if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            $profile_image = time().'.'.$image->getClientOriginalExtension();
            $image->move("public/img/", $profile_image);
            $profile_image = $profile_image;
        }else{
            $profile_image = $request->pre_profile_img;
        }
        $admin = Admin::find($request->id);
        $admin->image = $profile_image;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->save();
        Session::flash('message', 'Profile updated successfully.');
        return redirect('/admin/profile/'.base64_encode($request->id));
    }

    public function banners(Request $request){
        $admin_id = session::get('id');
        $data['banners']=Banner::orderBy('position_id', 'asc')->get();
        $data['admin']=Admin::find($admin_id);
        return view('admin.banners', $data);
    }

    public function addBanner(Request $request){
        if($request->id){
            $data['banner']=Banner::find($request->id);
        }
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        return view('admin.addBanner', $data);
    }

    public function insertBanner(Request $request){
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
        if($request->banner_id!=''){
            $banner = Banner::find($request->banner_id);
            $banner->image = $imageName;
            $banner->name = $request->name;
            $banner->discription = $request->discription;
            $banner->update();
            echo "update";
            // return redirect()->back()->with('message', 'Banner updated successfully.');
        }else{
            $banner = new Banner;
            $banner->image = $imageName;
            $banner->name = $request->name;
            $banner->discription = $request->discription;
            $banner->save();
            echo "add";
            // return redirect()->back()->with('message', 'Banner added successfully.');
        }
    }
    public function update_status($id, $table){
        $model = 'App\Models\\'.$table;
        $item = $model::find($id);
        if($item->status == 1){ $update=0; }else if($item->status == 0){ $update=1; }
        $model::where('id', $id)->update([ 'status' => $update ]);
        return redirect()->back()->with('message', 'Status changed successfully.');
    }

    public function delete($id, $table){
        $model = 'App\Models\\'.$table;
        $model::destroy($id);
        // $item = $model::find($id);
        // $item->delete();
        return redirect()->back()->with('message', 'Deleted successfully.');
    }

    public function updateBannerOrder(Request $request){
        $arr=$request->allData;
        $num=0;
        for($i=0;$i<count($arr);$i++)
        {
            $banner = Banner::find($arr[$i]);
            $banner->position_id = $num=$num+1;
            $banner->update();
        } 
    }
}
