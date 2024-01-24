@include('admin.header')
<style>    


.img-bg {
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  position: relative;
  padding-bottom: 100%;
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
                                            <form method="post" id="saveform">
                                                @csrf                                                
                                                <div class="form-group">
                                                    <label>Select Type</label>
                                                    <select class="form-select user_type" name="user_type">
                                                        <option selected disabled>Select Type</option>
                                                        <option value="1" <?php if(isset($data->id)  && $data->user_type==1){echo "selected";}?>>Hospitals</option>
                                                        <option value="2" <?php if(isset($data->id)  && $data->user_type==2){echo "selected";}?>>Staff</option>
                                                        <option value="3" <?php if(isset($data->id)  && $data->user_type==3){echo "selected";}?>>Doctors</option>
                                                        
                                                    </select>
                                                </div>
                                                <?php if(isset($data->id) && $data->user_type==1){?>
                                                <div class="form-group" id="toggle">
                                                    <label>Hospital</label>
                                                    <select class="form-select hospitals" name="hospital_id">
                                                        <option selected disabled>Select Hospital</option>
                                                        <option value="all">All</option>
                                                        @foreach($hospital as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->to_user){ echo"selected"; }} ?>>{{$value->hosp_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <?php } else if(isset($data->id) && $data->user_type==2){?>
                                                    <div class="form-group" id="toggle">
                                                    
                                                </div>
                                                <?php } else if(isset($data->id) && $data->user_type==3){?>
                                                <div class="form-group" id="toggle">
                                                    <label>Doctor</label>
                                                    <select class="form-select doctors" name="doctor_id">
                                                        <option selected disabled>Select Doctor</option>
                                                        <option value="all">All</option>
                                                        @foreach($doctor as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->to_user){ echo"selected"; }} ?>>{{$value->doc_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <?php }else{?>
                                                    <div class="form-group" id="toggle">
                                                   
                                                </div>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label>Heading</label>
                                                    <input type="text" class="form-control heading" name="heading" placeholder="Heading" id="heading" value="<?php if(isset($data->id)){ echo $data->heading;} ?>">
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" rows="2" placeholder="Message" class="form-control message" class="message"><?php if(isset($data->id)){echo $data->message;}?></textarea>
                                                </div>

                                                
                                                
                                                
                                                <!-- <div class="form-group">
                                                    <label>About</label>
                                                    <textarea class="form-control about" name="about" placeholder="about" id="about"><?php if(isset($data->id)){ echo $data->message;} ?></textarea>
                                                    <textarea class="displaynone" id="abouts" name="abouts"></textarea>
                                                </div> -->
                                                
                                                <input type="hidden" class="id" name="id" value="<?php if(isset($data->id)){ echo $data->id;} ?>">
                                                <button type="button" class="btn_1 full_width text-center submitdata">Submit</button>
                                                <div class="alert alert-success text-center hide1"><span class="msg_success"></span></div>
                                                <div class="alert alert-danger text-center hide2"><span class="msg_danger"></span></div>
                                               
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- <script>

var myEditors;

ClassicEditor
    .create( document.querySelector( '#about' ) )
    .then( editor => {
        console.log( 'Editor was initialized', editor );
        myEditors = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
</script> -->
<script type="text/javascript">
    $('.user_type').change(function(){
         var user_type = $(this).val();
         var noti_id='<?php if(isset($data->id)){echo $data->id;}?>'
         var token = "<?=csrf_token()?>";
        $.ajax({
          type:'POST',
          url:'{{url("/filterUserType")}}',
          data  :{user_type:user_type,noti_id:noti_id,_token:token},          
          success:function(data){
            // location.reload();
            console.log(data)
            $('#toggle').html(data);
          }
          
      });
    });
</script>

<script>
    $('.submitdata').click(function(){
        var user_type= $('.user_type').val();
        var heading=$('.heading').val();
        var message=$('.message').val();
        var to_user=0;
        if(user_type==1){

            to_user=$('.hospitals').val();
            var error="hospitals";

        }else if(user_type==2){

            var error="staff";

        }else if(user_type==3){

            var error="doctors";
            to_user=$('.doctors').val();

        }
        if(user_type=='' || user_type==null){
            $('.user_type').css('border','1px solid red');
            $(window).scrollTop($('.user_type').position().top);
            return false;
        }else if(to_user=='' || to_user==null){
            $('.user_type').css('border','');
            $('.'+error).css('border','1px solid red');
            $(window).scrollTop($('.'+error).position().top); 
            return false;
        }else if(heading==''){
            $('.'+error).css('border','');
            $('.heading').css('border','1px solid red');
            $(window).scrollTop($('.heading').position().top); 
            return false;
        }else if(message==''){
            $('.heading').css('border','');
            $('.message').css('border','1px solid red');
            $(window).scrollTop($('.message').position().top); 
            return false;
        }
        else{
            $('.name').css('border','');
            $.ajax({
                type:'POST',
                url:'{{url("/insert_notification")}}',
                data  :new FormData( $("#saveform")[0] ),
                async   : false,
                cache   : false,
                contentType : false,
                processData : false,
                success:function(data){
                    console.log(data);
                    if($.trim(data)=="done"){
                    $('.hide1').css('display','block');
                    $('.msg_success').text("Notification Sucessfully Send");
                    $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                        window.location.href="{{URL::to('/Notification')}}";
                    });

                    }
                    if($.trim(data)=="udone")
                    {
                        $('.hide1').css('display','block');
                        $('.msg_success').text("Notification Sucessfully Updated");
                        $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                            window.location.href="{{URL::to('/Notification')}}";
                        });
                    }
                    
                }
                
            });
        }
    })
</script>

@include('admin.footer')