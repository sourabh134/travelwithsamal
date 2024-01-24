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
                                                    <div class="upload__box">
                                                        <div class="upload__btn-box">
                                                            <label class="upload__btn">
                                                            Upload images
                                                            <input type="file" data-max_length="20" class="upload__inputfile" name="blog_image">
                                                            </label>
                                                        </div>
                                                        <div class="upload__img-wrap">
                                                            <?php if(isset($data->id)){ ?>
                                                                
                                                                    <img id="previewImg" src="{{asset('public/images/blog/')}}/{{$data->image}}" alt="Placeholder" width="175px" height="180px"><input type="hidden" value="{{$data->image}}" name="old_image"> &emsp;
                                                                
                                                           <?php }?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Heading</label>
                                                    <input type="text" class="form-control heading" name="heading" placeholder="Heading" value="<?php if(isset($data->id)){ echo $data->heading;} ?>">
                                                </div>
                                                
                                                
                                                
                                                
                                                <div class="form-group">
                                                    <label>About</label>
                                                    <textarea class="form-control content" name="content" placeholder="Content" id="content"><?php if(isset($data->id)){ echo $data->content;} ?></textarea>
                                                    <textarea class="displaynone" id="contents" name="contents"></textarea>
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
    .create( document.querySelector( '#content' ) )
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
        var image=$('.upload__inputfile').val();
        var heading=$('.heading').val();
        var about = myEditors.getData();
        var id=$('.id').val();
        
        if(image=='' && id==''){
            $('.address').css('border','');
            alert("Please upload your Image");
            $(window).scrollTop($('.upload__inputfile').position().top); 
            return false;
        }else if(heading==''){
            $('.heading').css('border','1px solid red');
            $(window).scrollTop($('.heading').position().top);
            return false;
        }else if(about==''){
            $('.heading').css('border','');
            alert("Please fill some content"); 
            return false;
        }
        
        else{
            $('.heading').css('border','');
            $('#contents').val(about);
            $.ajax({
                type:'POST',
                url:'{{url("/insert_blog")}}',
                data  :new FormData( $("#saveform")[0] ),
                async   : false,
                cache   : false,
                contentType : false,
                processData : false,
                success:function(data){
                    console.log(data);
                    if($.trim(data)=="done"){
                    $('.hide1').css('display','block');
                    $('.msg_success').text("Blog Sucessfully Posted");
                    $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                        window.location.href="{{URL::to('/blogs')}}";
                    });

                    }
                    if($.trim(data)=="udone")
                    {
                        $('.hide1').css('display','block');
                        $('.msg_success').text("Blog Sucessfully Updated");
                        $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                            window.location.href="{{URL::to('/blogs')}}";
                        });
                    }
                }
                
            });
        }
    })
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