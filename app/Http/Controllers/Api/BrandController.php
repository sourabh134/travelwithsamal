<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Agent;

class BrandController extends Controller
{
    function allBrand(Request $request){
        $userID = $request->userID;
        $err_array =array();
        if($userID==null){
            $err_array[]='userID';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{
            $popular = Brand::where('status',1)->orderBy('name','ASC')->get();
            $popularBrandArray = array();
            foreach($popular as $popValue){
                $datap['id'] = $popValue->id;
                $datap['name'] = $popValue->name;
                $datap['description'] = $popValue->description;
                $datap['logo'] = $popValue->logo;
                array_push($popularBrandArray,$datap);
            }
            return response()->json(['success'=>'true','message'=>'','result'=>$popularBrandArray], 200);
        }
    }
}
