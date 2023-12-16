<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function hospital(Request $request){
        $data['title'] = "Hospital";
        return view('admin/hospital',$data);
    }
}
