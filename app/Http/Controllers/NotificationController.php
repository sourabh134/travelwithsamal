<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Doctor;
use App\Models\Hospital;

class NotificationController extends Controller
{
    public function Notification(){
        $data['title']="Notification";
        $data['noti']=Notification::whereNot('status',2)->get();
        return view('admin/notification',$data);
    }
    public function addNotification(Request $request){
        $data['title']="Send Notifications";
        $id=base64_decode($request->key);
        $data['hospital']=Hospital::where('status',1)->get();
        $data['doctor']=Doctor::where('status',1)->get();
        $data['data']=Notification::find($id);
        return view('admin/addNotification',$data);
    }
    public function filterUserType(Request $request){
        if($request->user_type==1){
            $detail=Hospital::where('status',1)->get();
            echo'<label>Hospital</label>
                <select class="form-select hospitals" name="hospital_id">
                    <option selected disabled>Select Hospital</option>';
                    if($request->noti_id==''){
                    echo'<option value="all">All</option>';
                }
           foreach($detail as $val){
                echo '<option value="'.$val->id.'"';
                echo '>'.$val->hosp_name.'</option></select>';
           }
        }else if($request->user_type==2){

        }else if($request->user_type==3){
            $detail=Doctor::where('status',1)->get();
            echo'<label>Doctor</label>
                <select class="form-select doctors" name="doctor_id">
                    <option selected disabled>Select Doctor</option>';
                    if($request->noti_id==''){
                    echo'<option value="all">All</option>';
                }
           foreach($detail as $val){
                echo '<option value="'.$val->id.'"';
                echo '>'.$val->doc_name.'</option></select>';
           }
        }
                                           
    }
    public function insert_notification(Request $request){
        $user_type=$request->user_type;
        if($request->id==''){
            if($user_type==1 && $request->hospital_id=='all'){
                $data=Hospital::where('status',1)->get();
                foreach($data as $val){
                    $noti=new Notification;
                    $noti->to_user=$val->id;
                    $noti->from_user=1;
                    $noti->heading=$request->heading;
                    $noti->message=$request->message;
                    $noti->user_type=$user_type;
                    $noti->save();
                    
                }
                echo "done";
            }else if($user_type==2 && $request->hospital_id=='all'){

            }else if($user_type==3 && $request->doctor_id=='all'){
                $data=Doctor::where('status',1)->get();
                foreach($data as $val){
                    $noti=new Notification;
                    $noti->to_user=$val->id;
                    $noti->from_user=1;
                    $noti->heading=$request->heading;
                    $noti->message=$request->message;
                    $noti->user_type=$user_type;
                    $noti->save();
                }
                echo "done";

            }else{
                $noti=new Notification;
                if($user_type==1){

                    $noti->to_user=$request->hospital_id;
                }else if($user_type==2){

                    $noti->to_user=$request->staff_id;
                    
                }else if($user_type==3){
                    
                    $noti->to_user=$request->doctor_id;
                    
                }
                $noti->from_user=1;
                $noti->heading=$request->heading;
                $noti->message=$request->message;
                $noti->user_type=$user_type;
                $noti->save();
                echo "done";
            }
            
        }else{
            $noti=Notification::find($request->id);
            if($user_type==1){
                
                $noti->to_user=$request->hospital_id;
                
            }else if($user_type==2){
                
                $noti->to_user=$request->staff_id;
                
            }else if($user_type==3){
                
                $noti->to_user=$request->doctor_id;
                
            }
                $noti->from_user=1;
                $noti->heading=$request->heading;
                $noti->message=$request->message;
                $noti->user_type=$user_type;
                $noti->save();
                echo "udone";
        }
    }
    public function notification_status(Request $request){
        $key=base64_decode($request->key);
        $hosp = Notification::find($key);
        if($hosp->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $hosp->status = $status;
        $hosp->save();
        return redirect()->back()->with('success','Notification Status Changed');
    }
    public function delete_notification(Request $request){
        $id = $request->id;
        $hosp = Notification::find($id);
        $hosp->status = 2;
        $hosp->save();
    }
    public function notificationDetail(Request $request){
        $id=base64_decode($request->key);
        $data['title']="Notification Detail";
        $data['noti']=Notification::find($id);
        return view('admin/notificationDetail',$data);
    }
}
