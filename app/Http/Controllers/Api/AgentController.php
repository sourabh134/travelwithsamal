<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Agent;
use App\Models\AgentBanner;

class AgentController extends Controller
{
    public function allaggent(Request $request){
        $userID = $request->userID;
        $err_array =array();
        if($userID==null){
            $err_array[]='userID';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{
            $currentDate = date('Y-m-d');
            $banner = AgentBanner::where('end_date','>=',$currentDate)->where('status',1)->orderBy('position_id', 'asc')->get();
            $bannerArray = array();
            foreach($banner as $value){
                $data['id'] = $value->id;
                $data['position_id'] = $value->position_id;
                $data['image'] = $value->image;
                $data['name'] = $value->name;
                $data['start_date'] = $value->start_date;
                $data['end_date'] = $value->end_date;
                if($value->start_date<=$currentDate){
                    array_push($bannerArray,$data);
                }            
            }
            //agencies
            $agencies = Agent::where('status',1)->get();
            $agenciesArray = array();
            foreach($agencies as $aggvalue){
                $dataa['id'] = $aggvalue->id;
                $dataa['name'] = $aggvalue->name;
                $dataa['logo'] = $aggvalue->logo;
                $dataa['description'] = $aggvalue->description;
                $dataa['images'] = $aggvalue->images;
                array_push($agenciesArray,$dataa);
            }
            $arr['banner'] = $bannerArray;
            $arr['agencies'] = $agenciesArray;
            return response()->json(['success'=>'true','message'=>'','result'=>$arr], 200);
        }

    }
}
