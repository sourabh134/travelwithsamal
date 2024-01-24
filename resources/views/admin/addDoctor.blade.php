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
                                        <!-- <div class="modal-header theme_bg_1 justify-content-center">
                                            <h5 class="modal-title text_white">Resister</h5>
                                        </div> -->
                                        <div class="modal-body">
                                            <form method="post" id="saveform">
                                                @csrf                                                
                                                <div class="form-group">
                                                    <label>Doctor Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Doctor Name" value="<?php if(isset($data->id)){ echo $data->doc_name;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Hospital</label>
                                                    <select class="form-select hospitals" name="hospital_id">
                                                        <option selected disabled>Select Hospital</option>
                                                        @foreach($hospital as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->hosp_id){ echo"selected"; }} ?>>{{$value->hosp_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Specialities</label>
                                                    <select class="form-select specialities" name="specialityId[]" multiple>
                                                        <option value="">Choose</option>
                                                        @foreach($specialization as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->speciality_id){ echo"selected"; }} ?>>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="text" class="form-control number" name="number" placeholder="Number" id="number" value="<?php if(isset($data->id)){ echo $data->doc_number;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control email" name="email" placeholder="Email" value="<?php if(isset($data->id)){ echo $data->doc_email;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control password" name="password" placeholder="Password" value="<?php if(isset($data->id)){ echo $data->doc_password;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input type="text" class="form-control desigantion" name="desigantion" placeholder="Designation" id="desigantion" value="<?php if(isset($data->id)){ echo $data->designation;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Experience</label>
                                                    <input type="text" class="form-control experience" name="experience" placeholder="Experience" id="experience" value="<?php if(isset($data->id)){ echo $data->experience;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nationality</label>
                                                    <select class="form-select" name="country" id="country">
                                                        <option value="">Choose</option>
                                                        @foreach($country as $countryvalue)
                                                        <option value="{{$countryvalue->id}}" <?php if(isset($data->id)){ if($countryvalue->id == $data->Nationality){ echo"selected"; }} ?>>{{$countryvalue->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea name="address" rows="2" placeholder="Address" class="form-control address" class="address"><?php if(isset($data->id)){echo $data->address;}?></textarea>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <div class="upload__box">
                                                        <div class="upload__btn-box">
                                                            <label class="upload__btn">
                                                            Upload images
                                                            <input type="file" data-max_length="20" class="upload__inputfile" name="doc_image">
                                                            </label>
                                                        </div>
                                                        <div class="upload__img-wrap">
                                                            <?php if(isset($data->id)){ ?>
                                                                
                                                                    <img id="previewImg" src="{{asset('public/images/doctor/')}}/{{$data->doc_image}}" alt="Placeholder" width="175px" height="180px"><input type="hidden" value="{{$data->doc_image}}" name="old_image"> &emsp;
                                                                
                                                           <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Present Working</label>
                                                    <textarea class="form-control working" name="working" placeholder="Present Working" id="working"><?php if(isset($data->id)){ echo $data->present_working;} ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>About</label>
                                                    <textarea class="form-control about" name="about" placeholder="about" id="about"><?php if(isset($data->id)){ echo $data->about;} ?></textarea>
                                                    <textarea class="displaynone" id="abouts" name="abouts"></textarea>
                                                </div>
                                                
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
<script>

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
</script>
<script>
    $('.submitdata').click(function(){
        var name=$('.name').val();
        var hospitals=$('.hospitals').val();
        // alert(hospitals)
        var specialities=$('.specialities').val();
        var number=$('.number').val();
        var email=$('.email').val();
        var password=$('.password').val();
        var desigantion=$('.desigantion').val();
        var experience=$('.experience').val();
        var country=$('#country').val();
        var address=$('.address').val();
        var image=$('.upload__inputfile').val();
        var working=$('.working').val();
        var about = myEditors.getData();
        var id=$('.id').val();
        
        if(name=='' || name.length<5){
            $('.name').css('border','1px solid red');
            $(window).scrollTop($('.name').position().top);
            return false;
        }else if(hospitals=='' || hospitals==null){
            $('.name').css('border','');
            $('.hospitals').css('border','1px solid red');
            $(window).scrollTop($('.hospitals').position().top); 
            return false;
        }else if(specialities=='' || specialities=='undefined'){
            $('.hospitals').css('border','');
            $('.specialities').css('border','1px solid red');
            $(window).scrollTop($('.specialities').position().top); 
            return false;
        }else if(number==''){
            $('.specialities').css('border','');
            $('.number').css('border','1px solid red');
            $(window).scrollTop($('.number').position().top); 
            return false;
        }else if(email==''){
            $('.number').css('border','');
            $('.email').css('border','1px solid red');
            $(window).scrollTop($('.email').position().top); 
            return false;
        }else if(password==''){
            $('.email').css('border','');
            $('.password').css('border','1px solid red');
            $(window).scrollTop($('.password').position().top); 
            return false;
        }else if(desigantion==''){
            $('.password').css('border','');
            $('.desigantion').css('border','1px solid red');
            $(window).scrollTop($('.desigantion').position().top); 
            return false;
        }else if(experience==''){
            $('.desigantion').css('border','');
            $('.experience').css('border','1px solid red');
            $(window).scrollTop($('.experience').position().top); 
            return false;
        }else if(country=='' || country=='undefined'){
            $('.experience').css('border','');
            $('#country').css('border','1px solid red');
            $(window).scrollTop($('#country').position().top); 
            return false;
        }else if(address==''){
            $('#country').css('border','');
            $('.address').css('border','1px solid red');
            $(window).scrollTop($('.address').position().top); 
            return false;
        }else if(image=='' && id==''){
            $('.address').css('border','');
            // $('.upload__inputfile').css('border','1px solid red');
            alert("Please upload your Image");
            $(window).scrollTop($('.upload__inputfile').position().top); 
            return false;
        }else if(working==''){
            $('.upload__inputfile').css('border','');
            $('.working').css('border','1px solid red');
            $(window).scrollTop($('.working').position().top); 
            return false;
        }else if(about==''){
            $('.working').css('border','');
            // $('.working').css('border','1px solid red');
            alert("Please fill about your self");
            $(window).scrollTop($('.working').position().top); 
            return false;
        }
        
        else{
            $('.name').css('border','');
            $('.file').css('border','');
            $('.ck-editor').css('border','');
            $('#abouts').val(about);
            $.ajax({
                type:'POST',
                url:'{{url("/insert_doctor")}}',
                data  :new FormData( $("#saveform")[0] ),
                async   : false,
                cache   : false,
                contentType : false,
                processData : false,
                success:function(data){
                    console.log(data);
                    if($.trim(data)=="done"){
                    $('.hide1').css('display','block');
                    $('.msg_success').text("Sucessfully submitted");
                    $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                        window.location.href="{{URL::to('/doctors')}}";
                    });

                    }
                    if($.trim(data)=="udone")
                    {
                        $('.hide1').css('display','block');
                        $('.msg_success').text("Sucessfully Updated");
                        $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                            window.location.href="{{URL::to('/doctors')}}";
                        });
                    }
                    if($.trim(data)=="2"){
                    $('.hide2').css('display','block');
                    $('.msg_danger').text("Name already exist");
                    $(".alert-danger").show('slow' , 'linear').delay(4000).fadeOut();

                    }
                }
                
            });
        }
    })
</script>
<script>
    $('#country').change(function(){
        var country_id = $(this).val();
        var token = "<?=csrf_token()?>";
        if(!country_id){
            $('#country').css("border","1px solid red");
        }else{
            $('#country').css("border","");
            $.ajax({
                type:'POST',
                url:"{{url('/getState')}}",
                data:{country_id:country_id,_token:token},
                success:function(res){
                    $('#state').html(res)

                }
            })
        }
    });

</script>
<script>
    $('#state').change(function(){
        var state_id = $(this).val();
        var token = "<?=csrf_token()?>";
        if(!state_id){
            $('#state').css("border","1px solid red");
        }else{
            $('#state').css("border","");
            $.ajax({
                type:'POST',
                url:"{{url('/getCity')}}",
                data:{state_id:state_id,_token:token},
                success:function(res){
                    $('#city').html(res)

                }
            })
        }
    });

</script>
<script>
    jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
 var imgWrap = "";
var imgArray = [];

$('.upload__inputfile').each(function () {
  $(this).on('change', function (e) {
    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
    var maxLength = $(this).attr('data-max_length');

    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);

    // Remove existing images
    imgWrap.empty();
    imgArray = [];

    var iterator = 0;
    filesArr.forEach(function (f, index) {

      if (!f.type.match('image.*')) {
        return;
      }

      if (imgArray.length >= maxLength) {
        return false;
      } else {
        imgArray.push(f);

        var reader = new FileReader();
        reader.onload = function (e) {
          var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + iterator + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
          imgWrap.append(html);
          iterator++;
        }
        reader.readAsDataURL(f);
      }
    });
  });
});


  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
</script>
@include('admin.footer')