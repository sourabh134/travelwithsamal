<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TreatmeantController extends Controller
{
    public function treatmeants(Request $request){
        $data['title'] = "Treatmeants";
        return view('admin/treatments',$data);
    }

    public function addTreatmeants(Request $request){
        $data['title'] = "Treatmeants";
        return view('admin/addTreatments',$data);
    }
    public function treatmentstype(Request $request){
        $data['title'] = "Treatmeants Type";
        return view('admin/treatmentstype',$data);
    }

    public function addTreatmentsType(Request $request){
        $data['title'] = "Treatmeants Type";
        return view('admin/addTreatmentsType',$data);
    }
}
