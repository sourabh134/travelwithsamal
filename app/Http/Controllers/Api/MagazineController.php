<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Magazine;

class MagazineController extends Controller
{
    public function allmagazine(Request $request){
        $userID = $request->userID;
        $err_array =array();
        if($userID==null){
            $err_array[]='userID';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{
            $newsbanner = Magazine::where('banner',1)->where('status',1)->orderBy('postedDate','DESC')->get();
            $newsbannerarray = array();
            foreach($newsbanner as $nbvalue){
                $datanewsbanner['id'] = $nbvalue->id;
                $datanewsbanner['description'] = substr($nbvalue->description,0,50);
                $datanewsbanner['image'] = $nbvalue->image;
                $datanewsbanner['videourl'] = $nbvalue->videourl;
                $datanewsbanner['postedBy'] = $nbvalue->postedBy;
                $datanewsbanner['postedDate'] = $nbvalue->postedDate;
                array_push($newsbannerarray,$datanewsbanner);
            }
            //news
            $news = Magazine::where('status',1)->orderBy('postedDate','DESC')->get();
            $newsarray = array();
            foreach($news as $nvalue){
                $datanews['id'] = $nvalue->id;
                $datanews['description'] = substr($nvalue->description,0,50);
                $datanews['image'] = $nvalue->image;
                $datanews['videourl'] = $nvalue->videourl;
                $datanews['postedBy'] = $nvalue->postedBy;
                $datanews['postedDate'] = $nvalue->postedDate;
                array_push($newsarray,$datanews);
            }
            $arr['banner'] = $newsbannerarray;
            $arr['news'] = $newsarray;
            return response()->json(['success'=>'true','message'=>'','result'=>$arr], 200);
        }
    }

    public function magazinedata(Request $request){
        $userID = $request->userID;
        $magazineID = $request->magazineID;
        $err_array =array();
        if($userID==null){
            $err_array[]='userID';    
        }
        if($magazineID==null){
            $err_array[]='magazineID';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{ 
            try{           
                $news = Magazine::where('id',$magazineID)->where('status',1)->orderBy('postedDate','DESC')->first();
                
                $datanews['id'] = $news->id;
                $datanews['description'] = $news->description;
                $datanews['image'] = $news->image;
                $datanews['videourl'] = $news->videourl;
                $datanews['postedBy'] = $news->postedBy;
                $datanews['postedDate'] = $news->postedDate;                
                return response()->json(['success'=>'true','message'=>'','result'=>$datanews], 200);
            }catch(\Exception $e){
                return response()->json(['success'=>'false','message'=>$e->getMessage()], 500);
            }
        }
    }

    public function magazinetabdata(Request $request){
        $userID = $request->userID;
        $err_array =array();
        if($userID==null){
            $err_array[]='userID';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{            
            //news
            $news = Magazine::where('status',1)->where('type',1)->orderBy('postedDate','DESC')->get();
            $newsarray = array();
            foreach($news as $nvalue){
                $datanews['id'] = $nvalue->id;
                $datanews['description'] = substr($nvalue->description,0,50);
                $datanews['image'] = $nvalue->image;
                $datanews['videourl'] = $nvalue->videourl;
                $datanews['postedBy'] = $nvalue->postedBy;
                $datanews['postedDate'] = $nvalue->postedDate;
                array_push($newsarray,$datanews);
            }            
            $arr['news'] = $newsarray;
            //review
            $review = Magazine::where('status',2)->where('type',2)->orderBy('postedDate','DESC')->get();
            $reviewarray = array();
            foreach($review as $rvalue){
                $datareview['id'] = $rvalue->id;
                $datareview['description'] = substr($rvalue->description,0,50);
                $datareview['image'] = $rvalue->image;
                $datareview['videourl'] = $rvalue->videourl;
                $datareview['postedBy'] = $rvalue->postedBy;
                $datareview['postedDate'] = $rvalue->postedDate;
                array_push($reviewarray,$datareview);
            }            
            $arr['review'] = $reviewarray;
            //video
            $video = Magazine::where('status',2)->where('type',3)->orderBy('postedDate','DESC')->get();
            $videoarray = array();
            foreach($video as $vvalue){
                $datavideo['id'] = $vvalue->id;
                $datavideo['description'] = substr($vvalue->description,0,50);
                $datavideo['image'] = $vvalue->image;
                $datavideo['videourl'] = $vvalue->videourl;
                $datavideo['postedBy'] = $vvalue->postedBy;
                $datavideo['postedDate'] = $vvalue->postedDate;
                array_push($videoarray,$datavideo);
            }            
            $arr['video'] = $videoarray;
            //event
            $event = Magazine::where('status',2)->where('type',4)->orderBy('postedDate','DESC')->get();
            $eventarray = array();
            foreach($event as $evalue){
                $dataevent['id'] = $evalue->id;
                $dataevent['description'] = substr($evalue->description,0,50);
                $dataevent['image'] = $evalue->image;
                $dataevent['videourl'] = $evalue->videourl;
                $dataevent['postedBy'] = $evalue->postedBy;
                $dataevent['postedDate'] = $evalue->postedDate;
                array_push($eventarray,$dataevent);
            }            
            $arr['event'] = $eventarray;

            return response()->json(['success'=>'true','message'=>'','result'=>$arr], 200);
        }
    }
}
