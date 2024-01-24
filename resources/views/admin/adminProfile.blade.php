@include('admin.header')
<style type="text/css">
  .user-profile-input-area {
    padding: 20px 15px 20px 15px;
    margin: auto;
    background: #cdcdcd0d;
    box-shadow: rgb(0 0 0 / 2%) 0px 1px 3px 0px, rgb(27 31 35 / 15%) 0px 0px 0px 1px;
}
.user-img-main-area {
    border: 1px solid #cdcdcd;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin: 10px auto;
}
.imgprofile {
    border-radius: 50%;
    border: 4px solid #ebecec;
    object-fit: fill;
    height: 100%;
    width: 100%;
}
.form-group {
    margin-bottom: 1rem;
}
.user-img-change-area {
    width: 55%;
    margin: 40px auto;
}
.user-profile-input-area label {
    font-weight: 700;
    font-size: 16px;
}

</style>
<div class="main_content_iner ">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_header">
            <div class="box_header m-0">
              <div class="main-title">
                <h3 class="m-0">{{$title}}</h3>
              </div>
            </div>
          </div>
          <div class="alert alert-success text-center hide1"><span class="msg_success"></span></div>
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header">
                <h4></h4>
               
                <div class="box_right d-flex lms_block">
                  <div class="serach_field_2">

                    <div class="search_inner">
                     

                    </div>
                  </div>
                </div>
              </div>
              <form id="form_data">
              <div class="QA_table mb_30">
                @csrf
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="user-profile-input-area">
                           <div class="user-img-main-area">
                              <img src="{{asset('public/images/admin')}}/{{$admin->logo}}" alt="empower-yourself" class="imgprofile">  
                          </div> 
                           <div class="form-group">
                              <div class="user-img-change-area"> 
                                <label for="sel1">Change Profile</label>
                              <input type="file" name="profile_picture" accept="image/*">
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-8"> 
                      <div class="user-profile-input-area">
                         <div class="row">
                            <div class="col-md-12">
                             <div class="form-group">
                              <label for="sel1">Name</label>
                              <input type="text" name="name" class="form-control" value="<?= $admin->name ?>" required="">
                              </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                             <label for="sel1">Email</label>
                              <input type="text" name="email" class="form-control" id="email" value="<?= $admin->email ?>" >
                             </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label for="sel1">Phone Number</label>
                              <input type="text" name="phone_number" class="form-control" id="phonenumber" value="<?= $admin->phone ?>" required="">
                              </div>
                            </div>
                            <!-- <div class="col-md-12">
                             <div class="form-group">
                             <label for="sel1">Address</label>
                             <input type="text" name="address" class="form-control" id="phonenumber" value="A-3 noida sector 59" required="">
                            </div>
                            </div> -->

                         </div> 
                        <div class="border-top1">
                         <input type="hidden" name="id" value="1">
                         <input type="hidden" name="old_image" value="<?= $admin->logo ?>">
                         <button type="button" class="btn_1 full_width text-center get_admin_data" style="margin-top: 88px;">Update</button>
                        </div>
                      </div>
                  </div>

                </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.get_admin_data').click(function(){
    // alert()
    $.ajax({
        type:'POST',
        url:'{{url("/updateAdmin")}}',
        data  :new FormData( $("#form_data")[0] ),
        async   : false,
        cache   : false,
        contentType : false,
        processData : false,
        success:function(data){
            console.log(data);
            if($.trim(data)=="done"){
            // $('.hide1').css('display','block');
            $('.msg_success').text("Admin Updated Successfully !!");
            $(".alert-success").show('slow' , 'linear').delay(2000).fadeOut(function(){
                window.location.reload();
            });

            }
            
        }
        
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".alert-success").fadeOut(800);
  });
</script>
 @include('admin.footer')