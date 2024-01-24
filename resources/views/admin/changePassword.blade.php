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
          <div class="alert alert-danger text-center hide1"><span class="msg_danger"></span></div>
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
                    <!-- <div class="col-md-4"> 
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
                    </div> -->

                    <div class="col-md-12"> 
                      <div class="user-profile-input-area">
                         <div class="row">
                            <div class="col-md-12">
                             <div class="form-group">
                              <label for="sel1">Old Password</label>
                              <input type="text" name="old_pass" class="form-control" id="old_pass">
                              </div>
                            </div>
                            <div class="col-md-12">
                             <div class="form-group">
                             <label for="sel1">New Password</label>
                              <input type="text" name="new_pass" class="form-control" id="new_pass">
                             </div>
                            </div>
                            <div class="col-md-12">
                             <div class="form-group">
                              <label for="sel1">Confirm Password</label>
                              <input type="text" name="conf_pass" class="form-control" id="conf_pass">
                              </div>
                            </div>
                         </div> 
                        <div class="border-top1">
                         <button type="button" class="btn_1 full_width text-center get_admin_data" style="margin-top: 88px;">Change Password</button>
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
    var old_pass=$('#old_pass').val();
    var new_pass=$('#new_pass').val();
    var conf_pass=$('#conf_pass').val();

    if(old_pass==''){
      $('#old_pass').css('border','1px solid red');
      $(window).scrollTop($('#old_pass').position().top); 
      return false;
    } else if(new_pass==''){
      $('#old_pass').css('border','');
      $('#new_pass').css('border','1px solid red');
      $(window).scrollTop($('#new_pass').position().top); 
      return false;
    } else if(conf_pass==''){
      $('#new_pass').css('border','');
      $('#conf_pass').css('border','1px solid red');
      $(window).scrollTop($('#conf_pass').position().top); 
      return false;
    } else if(new_pass != conf_pass){
      $('#old_pass').css('border','');
      $('#new_pass').css('border','');
      $('#conf_pass').css('border','');
      $('.msg_danger').text("Confirm Password Not Match with New Password !!");
      $(".alert-danger").show('slow' , 'linear').delay(2000).fadeOut();
    }else {
      $('#old_pass').css('border','');
      $('#new_pass').css('border','');
      $('#conf_pass').css('border','');
      $.ajax({
        type:'POST',
        url:'{{url("/savePassword")}}',
        data  :new FormData( $("#form_data")[0] ),
        async   : false,
        cache   : false,
        contentType : false,
        processData : false,
        success:function(data){
            console.log(data);
            if($.trim(data)=="done"){
            $('.msg_success').text("Admin Password Changed !!");
            $(".alert-success").show('slow' , 'linear').delay(2000).fadeOut(function(){
                window.location.reload();
            });

            }else if($.trim(data)=='invalid_pass'){
              $('.msg_danger').text("Old Password Not Match !!");
              $(".alert-danger").show('slow' , 'linear').delay(2000).fadeOut(function(){
                  // window.location.reload();
              });
            }
            
        }
        
    });
    }
    
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".alert-success").fadeOut(800);
  });
</script>
 @include('admin.footer')