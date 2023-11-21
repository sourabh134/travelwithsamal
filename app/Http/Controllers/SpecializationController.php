<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function specialization(Request $request){
        $data['title'] = "Specialization";
        return view('admin/specialization',$data);
    }
}
