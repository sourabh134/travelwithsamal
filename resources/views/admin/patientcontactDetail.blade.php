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
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Name" value="<?php if(isset($contact->id)){ echo $contact->name;} ?>" readonly>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control email" name="email" placeholder="Email" value="<?php if(isset($contact->id)){ echo $contact->email;} ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control email" name="email" placeholder="Phone" value="<?php if(isset($contact->id)){ echo $contact->phone;} ?>" readonly>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="address" rows="2" placeholder="Address" class="form-control address" readonly><?php if(isset($contact->id)){echo $contact->message;}?></textarea>
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