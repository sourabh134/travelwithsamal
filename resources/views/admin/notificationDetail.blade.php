@include('admin.header')
<style>    


.img-bg {
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  position: relative;
  padding-bottom: 100%;
}
.deleteHos{
    display: block;
}
button.deleteHos {
    background: #22c7b8;
    border: unset;
    margin-top: 15px;
    display: block;
    padding: 5px 20px;
    border-radius: 5px;
    color: white;
    font-weight: 500;
    font-size: 16px;
    margin-bottom: 20px;
}
</style>
<div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="dashboard_header mb_50">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="dashboard_header_title">
                                        <h4>{{$title}} Form</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="dashboard_breadcam text-end">
                                        <p><a href="{{url('/dashboard')}}">Dashboard</a> <i
                                                class="fas fa-caret-right"></i>{{$title}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">

                                    <div class="modal-content cs_modal">
                                        
                                        <div class="modal-body">
                                            <?php 
                                            if($noti->user_type==1){
                                                $name=App\Models\Hospital::find($noti->to_user)->hosp_name;
                                                $type="Hospital";
                                            }else if($noti->user_type==2){

                                            }else if($noti->user_type==3){
                                                $name=App\Models\Doctor::find($noti->to_user)->doc_name;
                                                $type="Doctor";
                                            }

                                                ?>
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Hospital Name" value="<?php if(isset($noti->id)){ echo $name;} ?>" readonly>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label>Heading</label>
                                                    <input type="text" class="form-control email" name="email" placeholder="Email" value="<?php if(isset($noti->id)){ echo $noti->heading;} ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Notification Type</label>
                                                    <input type="text" class="form-control email" name="email" placeholder="Email" value="<?php if(isset($noti->id)){ echo $type;} ?>" readonly>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea class="form-control description" name="description" id="description" readonly><?php if(isset($noti->id)){ echo $noti->message;} ?></textarea>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('admin.footer')