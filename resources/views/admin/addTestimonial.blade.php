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
                                                    <label>Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Name" value="<?php if(isset($data->id)){ echo $data->name;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Hospital</label>
                                                    <select class="form-select hospitals" name="hospital_id">
                                                        <option selected disabled>Select Hospital</option>
                                                        @foreach($hospital as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->hospital_id){ echo"selected"; }} ?>>{{$value->hosp_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Treatmeant</label>
                                                    <select class="form-select treatmeant" name="treatmeant[]" multiple>
                                                        <option value="">Choose</option>
                                                        @foreach($treatmeant as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->treatment_id){ echo"selected"; }} ?>>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                               
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-select" name="country" id="country">
                                                        <option value="">Choose</option>
                                                        @foreach($country as $countryvalue)
                                                        <option value="{{$countryvalue->id}}" <?php if(isset($data->id)){ if($countryvalue->id == $data->country_id){ echo"selected"; }} ?>>{{$countryvalue->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group">
                                                    <div class="upload__box">
                                                        <div class="upload__btn-box">
                                                            <label class="upload__btn">
                                                            Upload images
                                                            <input type="file" data-max_length="20" class="upload__inputfile" name="testi_image">
                                                            </label>
                                                        </div>
                                                        <div class="upload__img-wrap">
                                                            <?php if(isset($data->id)){ ?>
                                                                
                                                                    <img id="previewImg" src="{{asset('public/images/testimonial/')}}/{{$data->image}}" alt="Placeholder" width="175px" height="180px"><input type="hidden" value="{{$data->image}}" name="old_image"> &emsp;
                                                                
                                                           <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea class="form-control message" name="message" placeholder="Message" id="message"><?php if(isset($data->id)){ echo $data->message;} ?></textarea>
                                                    <textarea class="displaynone" id="messages" name="messages"></textarea>
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
    .create( document.querySelector( '#message' ) )
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
        var treatmeant=$('.treatmeant').val();
        var country=$('#country').val();
        var image=$('.upload__inputfile').val();
        var message = myEditors.getData();
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
        }else if(treatmeant=='' || treatmeant=='undefined'){
            $('.hospitals').css('border','');
            $('.treatmeant').css('border','1px solid red');
            $(window).scrollTop($('.treatmeant').position().top); 
            return false;
        }else if(country=='' || country=='undefined'){
            $('.treatmeant').css('border','');
            $('#country').css('border','1px solid red');
            $(window).scrollTop($('#country').position().top); 
            return false;
        }else if(image=='' && id==''){
            $('#country').css('border','');
            alert("Please upload your Image");
            $(window).scrollTop($('.upload__inputfile').position().top); 
            return false;
        }else if(message==''){
            alert("Please fill your message"); 
            return false;
        }
        
        else{
            $('.name').css('border','');
            $('#messages').val(message);
            $.ajax({
                type:'POST',
                url:'{{url("/insert_testimonials")}}',
                data  :new FormData( $("#saveform")[0] ),
                async   : false,
                cache   : false,
                contentType : false,
                processData : false,
                success:function(data){
                    console.log(data);
                    if($.trim(data)=="done"){
                    $('.hide1').css('display','block');
                    $('.msg_success').text("Testimonial Sucessfully Added");
                    $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                        window.location.href="{{URL::to('/testimonials')}}";
                    });

                    }
                    if($.trim(data)=="udone")
                    {
                        $('.hide1').css('display','block');
                        $('.msg_success').text("Testimonial Sucessfully Updated");
                        $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                            window.location.href="{{URL::to('/testimonials')}}";
                        });
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