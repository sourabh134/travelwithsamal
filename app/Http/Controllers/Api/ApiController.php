<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Agent;
use App\Models\Magazine;

class ApiController extends Controller
{
    public function registerUser(Request $request){
        $err_array =array();
        $email = $request->email;
        $username = $request->username;
        $phone = $request->phone;
        if($email==null){
            $err_array[]='email';    
        }
        if($username==null){
            $err_array[]='username';    
        }
        if($phone==null){
            $err_array[]='phone';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{
            $checkuser = User::where('mobile_number',$phone)->where('status',1)->count();
            if($checkuser==0){
                $user = new User;
                $user->name = $username;
                $user->email = $email;
                $user->mobile_number = $phone;
                $user->status = 1;
                $user->save();
                return response()->json(['success'=>'true','message'=>'You have successfully registered'], 200);
            }else{
                return response()->json(['success'=>'false','message'=>'Mobile Number has already exist '], 200);
            }
        }
    }

    public function login(Request $request){
        $err_array =array();
        $phone = $request->phone;
        if($phone==null){
            $err_array[]='phone';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{
            $checkuser = User::where('mobile_number',$phone)->where('status',1);
            if($checkuser->count()!=0){                
                return response()->json(['success'=>'true','message'=>'You have successfully login','userID'=>$checkuser->first()->id], 200);
            }else{
                return response()->json(['success'=>'false','message'=>'This mobile number is not registered with us'], 200);
            }
        }
    }

    public function getUserProfile(Request $request){
        $err_array =array();
        $userID = $request->userID;
        if($userID==null){
            $err_array[]='userID';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{
            $checkuser = User::where('id',$userID)->where('status',1);
            if($checkuser->count()!=0){ 
                $row = $checkuser->first();
                $data['id'] = $row->id;                
                $data['username'] = $row->name;                
                $data['gender'] = $row->gender;                
                $data['email'] = $row->email;                
                $data['mobile_number'] = $row->mobile_number;                
                $data['DriverLicense'] = $row->DriverLicense;
                $data['profileImage'] = $row->profileImage;
                return response()->json(['success'=>'true','message'=>'','result'=>$data], 200);
            }else{
                return response()->json(['success'=>'false','message'=>'This mobile number is not registered with us'], 200);
            }
        }
    }

    public function UpdateProfile(Request $request){
        $err_array =array();
        $email = $request->email;
        $username = $request->username;
        $phone = $request->phone;
        $DriverLicense = $request->DriverLicense;
        $profileImage = $request->profileImage;
        $gender = $request->gender;
        $userID = $request->userID;
        if($email==null){
            $err_array[]='email';    
        }
        if($username==null){
            $err_array[]='username';    
        }
        if($phone==null){
            $err_array[]='phone';    
        }
        if(count($err_array)>0){
            $er = implode(",", $err_array);    
            return response()->json(['success'=>'false','message'=>"400 Bad Request, missing ".$er], 400);    
        }else{
            $checkuser = User::where('mobile_number',$phone)->where('id',$request->userID);
            if($checkuser->count() >= 1 && $request->userID != $checkuser->first()->id){
                return response()->json(['success'=>'false','message'=>'Mobile Number has already exist '], 200);
            }else{
                if($request->DriverLicense!=''){
                    $imageName = time().'.'.$request->DriverLicense->extension();      
                    $request->DriverLicense->move(public_path('images'), $imageName);
                }else{
                    $imageName = '';
                }
                if($request->profileImage!=''){
                    $imageName1 = time().'.'.$request->profileImage->extension();      
                    $request->profileImage->move(public_path('images'), $imageName1);
                }else{
                    $imageName1 = '';
                }
                $user = new User;
                $user = User::find($userID);
                $user->name = $username;
                $user->email = $email;
                $user->mobile_number = $phone;
                $user->gender = $gender;
                $user->status = 1;
                if($imageName!=''){
                    $user->DriverLicense = $imageName;
                }
                if($imageName1!=''){
                    $user->profileImage = $imageName1;
                }
                $user->save();
                return response()->json(['success'=>'true','message'=>'You have successfully Updated'], 200);

            }            
        }
    }

    public function dashboard(Request $request){
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
            $banner = Banner::where('end_date','>=',$currentDate)->where('status',1)->orderBy('position_id', 'asc')->get();
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
            //popularbrand
            $popular = Brand::where('status',1)->where('popular',1)->orderBy('position','ASC')->get();
            $popularBrandArray = array();
            foreach($popular as $popValue){
                $datap['id'] = $popValue->id;
                $datap['name'] = $popValue->name;
                $datap['logo'] = $popValue->logo;
                array_push($popularBrandArray,$datap);
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
            //hotnews
            $news = Magazine::where('home',1)->where('status',1)->orderBy('postedDate','DESC')->get();
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
            $arr['banner'] = $bannerArray;
            $arr['popularcar'] = array();
            $arr['popularbrand'] = $popularBrandArray;
            $arr['agencies'] = $agenciesArray;
            $arr['topDeals'] = array();
            $arr['hotnews'] = $newsarray;

            return response()->json(['success'=>'true','message'=>'','result'=>$arr], 200);
        }
    }   

}
