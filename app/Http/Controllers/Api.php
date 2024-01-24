<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Mail;
use DB;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Otp;
use App\Models\Hospital;
use App\Models\Hosp_image;
use App\Models\Specialization;
use App\Models\State;
use App\Models\City;
use App\Models\Treatmeant;

class Api extends Controller
{
    public function user_registration(Request $request){
        // echo "<pre>";print_r($request->all());die;
         try {
                $rules = [
                    'full_name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'password' => 'required',
                    'confirm_password' => 'required',
                    'user_type' => 'required',
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(['false' => $validator->errors()], 422);
                }
                if($request->password != $request->confirm_password){
                    return response()->json(['success'=>'false','message'=>'Password not matched.'], 422);
                }
                $doctor=Doctor::where('doc_email',$request->email)->orWhere('doc_number',$request->phone)->count();
                $patient=User::where('email',$request->email)->orWhere('phone',$request->phone)->count();
                if($doctor>0 || $patient>0){
                    return response()->json(['success'=>'false','message'=>'Email or Phone number exist! Please try with an other credential.'], 422);
                }
                 if($request->user_type==1){
                    $table=new Doctor;
                    $table->doc_name=$request->full_name;
                    $table->doc_email=$request->email;
                    $table->doc_password=Hash::make($request->password);
                    $table->doc_number=$request->phone;
                    $table->status=0;
                    // echo "<pre>";print_r($table);die;
                    $table->save();
                    $table['user_type']=$request->user_type;
                }else if($request->user_type==2){
                    $table=new User;
                    $table->name=$request->full_name;
                    $table->email=$request->email;
                    $table->phone=$request->phone;
                    $table->password=Hash::make($request->password);
                    $table->status=0;
                    $table->save();
                    // echo "<pre>";print_r($table);die;
                    $table['user_type']=$request->user_type;
                }
                

                return response()->json(['success' => 'true', 'message' => 'Registration successfully Done','data'=>$table], 201);
            } catch (\Exception $e) {
                return response()->json(['false' => 'Internal Server Error'], 500);
            }
       
    }
    public function user_login(Request $request){
        // echo "<pre>";print_r($request->all());die;
        try {
            if($request->phone !=''){
                $rules = [
                    'phone' => 'required',
                    'device_token' => 'required',
                    'user_type' => 'required',
                ];
            }else{
                $rules = [
                    'email' => 'required',
                    'password' => 'required',
                    'device_token' => 'required',
                    'user_type' => 'required',
                ];
            }
               
                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(['false' => $validator->errors()], 422);
                }
                 if($request->user_type==1){
                    // echo 1;die;
                    if($request->phone !=''){
                        // echo 1;die;
                        $table=Doctor::where('doc_number',$request->phone);
                        if($table->count()>0){
                            $login=Doctor::find($table->first()->id);
                            $login->device_token=$request->device_token;
                            $login->save();
                            $login['user_type']=$request->user_type;
                        }else{
                            return response()->json(['success' => 'false', 'message' => 'Entered wrong number.'], 422);
                        }
                    }else{
                        // echo 2;die;
                        $table=Doctor::where('doc_email',$request->email);
                        if($table->count()>0){
                            // echo 1;die;
                            if(Hash::check($request->password, $table->first()->doc_password)){
                                // echo 2;die;
                                $login=Doctor::find($table->first()->id);
                                $login->device_token=$request->device_token;
                                $login->save();
                                $login['user_type']=$request->user_type;

                            }else{
                                return response()->json(['success' => 'false', 'message' => 'Invalid Password'], 422);
                            }
                        }else{
                            return response()->json(['success' => 'false', 'message' => 'Entered wrong email.'], 422);
                        }
                    
                    }
                    
                    
                }else if($request->user_type==2){
                    if($request->phone !=''){
                        $table=User::where('email',$request->email);
                        if($table->count()>0){
                            $login=User::find($table->id);
                            $login->remember_token=$request->device_token;
                            $login->save();
                            $login['user_type']=$request->user_type;    
                        }else{
                            return response()->json(['success' => 'false', 'message' => 'Entered wrong number.'], 422);
                        }
                        
                    }else{
                        $table=User::where('email',$request->email);
                        if($table->count()>0){
                            if(Hash::check($request->password, $table->first()->password)){
                                $login=User::find($table->first()->id);
                                $login->remember_token=$request->device_token;
                                $login->save();
                                $login['user_type']=$request->user_type;
                            }else{
                                return response()->json(['success' => 'false', 'message' => 'Invalid Password or Email','data'=>array()], 422);
                            }
                        }else{
                             return response()->json(['success' => 'false', 'message' => 'Entered wrong email.'], 422);
                        }
                        
                    }
                    
                   
                }
                

                return response()->json(['success' => 'true', 'message' => 'Login successfully Done','data'=>$login], 200);
            } catch (\Exception $e) {
                return response()->json(['false' => 'Internal Server Error'], 500);
            }
    }
    public function forget_password(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $otp=random_int(100000, 999999);
        $data=['email'=>$request->email,'otp'=>$otp];
        if($request->user_type==1){
            $check_data=Doctor::where('doc_email',$request->email);
            if($check_data->count()>0){
                Mail::send('email.otp', $data, function($message) use ($data) {
                  $message->to($data['email'],'OMCA')   
                  ->subject('OMCA');
                  $message->from('mobappssolutions131@gmail.com', 'OMCA');            
                });

                
                $table=new Otp;
                $table->email=$request->email;
                $table->otp=$otp;
                $table->save();
                return response()->json(['success'=>'true','message'=>'OTP send on Email', 'data'=>$table], 200);
            }
        }else if($request->user_type==2){
            $check_data=User::where('email',$request->email);
            if($check_data->count()>0){
                Mail::send('email.otp', $data, function($message) use ($data) {
                  $message->to($data['email'],'OMCA')   
                  ->subject('OMCA');
                  $message->from('mobappssolutions131@gmail.com', 'OMCA');            
                });

                
                $table=new Otp;
                $table->email=$request->email;
                $table->otp=$otp;
                $table->save();
                return response()->json(['success'=>'true','message'=>'OTP send on Email', 'data'=>$table], 200);
            }
        }
    }
    public function check_otp(Request $request){
        $otp_verify=Otp::where('email',$request->email)->orderBy('id','DESC')->first();
        if($request->otp== $otp_verify->otp){
            $doctor=Doctor::where('doc_email',$otp_verify->email)->first();
            $patient=User::where('email',$otp_verify->email)->first();
            if($doctor){
                $data=['user_type'=>1,'user_id'=>$doctor->id];
            }else{
                $data=['user_type'=>2,'user_id'=>$patient->id];
            }
          return response()->json(['success'=>'true','message'=>'OTP matched', 'data'=>$data], 200);  
        }else{
             return response()->json(['success' => 'false', 'message' => 'Invalid otp entered.'], 422);
        }
    }
    public function change_password(Request $request){
        // echo "<pre>";print_r($request->all());die
        if($request->new_password==$request->re_password){
            if($request->user_type==1){
                $data=Doctor::find($request->user_id);
                $data->doc_password=Hash::make($request->re_password);
                $data->save();
                $data['user_type']=$request->user_type;
            }else if($request->user_type==2){
                 $data=User::find($request->user_id);
                $data->password=Hash::make($request->re_password);
                $data->save();
                $data['user_type']=$request->user_type;
            }
           return response()->json(['success'=>'true','message'=>'Password Updated Successfully Done', 'data'=>$data], 200); 
        }else{
            return response()->json(['success' => 'false', 'message' => 'New Password not match.'], 422);
        }
    }
    public function all_hospital(){
        $data=Hospital::where('status',1)->get();
        foreach($data as $val){
            $image=Hosp_image::where(['hosp_id'=>$val->id,'status'=>1])->orderBy('id','DESC')->first();
            // echo "<pre>";print_r($image);die;
            $all_data[]=[
                'hospital_id'=>$val->id,
                'hospital_name'=>$val->hosp_name,
                'hospital_image'=>$image->hosp_image,
                'hospital_address'=>$val->hosp_address,
                'acceradiation'=>'jci,nabi',
            ];
        }
        // echo "<pre>";print_r($all_data);die;
        return response()->json(['success'=>'true','message'=>'Hospital List', 'data'=>$all_data], 200);
    }
    public function treatment_list(){
        
       //  $data = Hospital::where('status', 1)->get();
       //  $real_data = [];

       //  foreach ($data as $hospital) {
       //      $ex = explode(',', $hospital->treatment_id);
       //      $treatments = Treatmeant::whereIn('id', $ex)->get();

       //      foreach ($treatments as $treatment) {
       //          $id = $treatment->id;
       //          $existingTreatment = null;
       //          foreach ($real_data as &$existing) {
       //              if ($existing['id'] === $id) {
       //                  $existingTreatment = &$existing;
       //                  break;
       //              }
       //          }

       //          if ($existingTreatment) {
       //              $existingTreatment['hospital_count']++;
       //          } else {
       //              $real_data[] = [
       //                  'id' => $id,
       //                  'name' => $treatment->name,
       //                  'hospital_count' => 1
       //              ];
       //          }
       //      }
       //  }

    /*==== if below code will not work in future then comment that and enable above code  =====*/

        $data = DB::table('treatmeants')
            ->select(
                'treatmeants.id',
                'treatmeants.name',
                DB::raw('COUNT(hospitals.id) as hospital_count')
            )
            ->leftJoin('hospitals', function ($join) {
                $join->on('hospitals.treatment_id', 'LIKE', DB::raw('CONCAT("%", treatmeants.id, "%")'))
                    ->whereRaw('FIND_IN_SET(treatmeants.id, hospitals.treatment_id) > 0');
            })
            ->groupBy('treatmeants.id', 'treatmeants.name')
            ->havingRaw('COUNT(hospitals.id) > 0')
            ->where('hospitals.status', 1)
            ->where('treatmeants.status', 1)
            ->get();

        
        // echo "<pre>";print_r($real_data);die;
        return response()->json(['success'=>'true','message'=>'Treatmeant List', 'data'=>$data], 200);
    }
    public function specialty_list(){
        // $data=Specialization::where('status',1)->get();
        $data = DB::table('specializations')
            ->select(
                'specializations.id',
                'specializations.name',
                DB::raw('COUNT(hospitals.id) as hospital_count')
            )
            ->leftJoin('hospitals', function ($join) {
                $join->on('hospitals.specialityId', 'LIKE', DB::raw('CONCAT("%", specializations.id, "%")'))
                    ->whereRaw('FIND_IN_SET(specializations.id, hospitals.specialityId) > 0');
            })
            ->groupBy('specializations.id', 'specializations.name')
            ->havingRaw('COUNT(hospitals.id) > 0')
            ->where('hospitals.status', 1)
            ->where('specializations.status', 1)
            ->get();
        return response()->json(['success'=>'true','message'=>'Specialty List', 'data'=>$data], 200);
    }
    public function city_list(){
        $all_data = DB::table('hospitals as hosp')
            ->select('city.id as city_id', 'city.name', DB::raw('COUNT(hosp.id) as hospital_count'))
            ->join('cities as city', 'city.id', '=', 'hosp.city')
            ->where('hosp.status', 1)
            ->groupBy('city.id', 'city.name')
            ->get();

/*==== if above code will not work in future then comment that and enable below code  =====*/

        // $data=Hospital::where('status',1)->get();
        // $all_data=array();
        // foreach($data as $val){
        //     $city=City::where('id',$val->city)->first();
        //     $hospital_count=Hospital::where('city',$city->id)->count();
                
        //         $arr['city_id']=$city->id;
        //         $arr['name']=$city->name;
        //         $arr['hospital_count']=$hospital_count;
        //         if(!in_array($arr['id'],array_column($all_data, 'id'))){
        //             array_push($all_data, $arr);
        //         }
             
        // }
        
        return response()->json(['success'=>'true','message'=>'City List', 'data'=>$all_data], 200);
    }
    public function hospital_filter(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $key=$request->key;
        if($key=='ca'){
            $data=DB::table('hospitals as hosp')
            ->select('hosp.*','city.id as city_id','city.name')
            ->join('cities as city','city.id','=','hosp.city')
            ->where('hosp.status',1)
            ->orderBy('city.id','ASC')
            ->get();    
        }else if($key=='cd'){
            $data=DB::table('hospitals as hosp')
            ->select('hosp.*','city.id as city_id','city.name')
            ->join('cities as city','city.id','=','hosp.city')
            ->where('hosp.status',1)
            ->orderBy('city.id','DESC')
            ->get();
        }else if($key=='sa'){
            
            // $data = DB::table('hospitals as hosp')
            // ->select('hosp.*','spe.id as spe_id', 'spe.name')
            // ->join('specializations as spe', 'spe.id', '=', 'hosp.specialityId')
            // ->where('hosp.status', 1)
            // ->orderBy('spe.id','ASC')
            // ->get();
            // $data = DB::table('specializations')
            //     ->select(
            //         'specializations.id as spe_id',
            //         'specializations.name as spe_name','hospitals.id','hospitals.name'
            //     )
            //     ->leftJoin('hospitals', function ($join) {
            //         $join->on('hospitals.specialityId', 'LIKE', DB::raw('CONCAT("%", specializations.id, "%")'))
            //             ->whereRaw('FIND_IN_SET(specializations.id, hospitals.specialityId) > 0');
            //     })
            //     ->groupBy('specializations.id', 'specializations.name')
            //     ->havingRaw('COUNT(hospitals.id) > 0')
            //     ->where('hospitals.status', 1)
            //     ->where('specializations.status', 1)
            //     ->get();
            $data = DB::table('specializations')
                ->select(
                    'specializations.id as spe_id',
                    'specializations.name as spe_name',
                    'hospitals.id as hospital_id',
                    'hospitals.hosp_name as hospital_name'
                )
                ->leftJoin('hospitals', function ($join) {
                    $join->on('hospitals.specialityId', 'LIKE', DB::raw('CONCAT("%", specializations.id, "%")'))
                        ->whereRaw('FIND_IN_SET(specializations.id, hospitals.specialityId) > 0');
                })
                ->groupBy('specializations.id', 'specializations.name', 'hospitals.id', 'hospitals.hosp_name')
                ->havingRaw('COUNT(hospitals.id) > 0')
                ->where('hospitals.status', 1)
                ->where('specializations.status', 1)
                ->get();


        }
        
        echo "<pre>";print_r($data);die;
    }
}
