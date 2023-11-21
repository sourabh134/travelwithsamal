<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request){
        return view('admin/login');
    }

    public function dashboard(Request $request){
        $data['title'] = "Dashboard";
        return view('admin/index',$data);
    }
}
