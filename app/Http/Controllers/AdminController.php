<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request){
        return view('admin/login');
    }

    public function dashboard(Request $request){
        $data['title'] = "Dashboard";
        return view('admin/index',$data);
    }

    public function adminLogin(Request $request)
    {        
        $username = $request->username;
        $password = $request->password;
        //die;
        $checkuser = Admin::where('email',$username)
        ->where('status',1);
        if($checkuser->count()!=0){
            $result = $checkuser->first();
            //echo $password; die;
            if(Hash::check($password, $result->password)){
                
                $adminUser =  $result->email;
                $adminPassword =  $result->password;
                $adminName = $result->name;
                $request->session()->put('adminUser', $adminUser);
                $request->session()->put('adminPassword', $adminPassword);
                $request->session()->put('cedsi_admin_user_id',$result->id);            
                return redirect('/dashboard');
            }else{
                
                Session::flash('message', 'Invalid Credentials'); 
                return redirect('/auth-login');
            }

        }else{
            
            Session::flash('message', 'Invalid Credentials'); 
            return redirect('/auth-login');
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/auth-login');
    }
    public function createpassword(Request $request){
        $id = 1;
        $password = "123456";
        $admin = Admin::find($id);
        $admin->password = Hash::make($password);
        $admin->save();
        echo "done";

    }
}
