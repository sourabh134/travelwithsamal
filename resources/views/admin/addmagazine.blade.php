
@include('admin.includes.header')
<div class="main_content_iner overly_inner ">
  <div class="container-fluid p-0 ">
    <div class="row">
      <div class="col-12">
        <div class="page_title_box d-flex align-items-center justify-content-between">
          <div class="page_title_left">
            <h4 class="f_s_30 f_w_700 text_white">{{$title}}</h4>
            <ol class="breadcrumb page_bradcam mb-0">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/magazine') }}">{{$title}}</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
          @if(Session::has('message'))
          <p class="alert alert-success"><span style="font-weight: 600;"> Success !! </span>{{ Session::get('message') }}</p>
          @endif
          <!-- <a href="#" class="white_btn3">Create Report</a> -->
        </div>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body p-5">
            <!-- <h2 class="card-title text-center pb-5">Add Brand</h2> -->
            <form method="post" id="saveform" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Heading</label>
              <div class="col-sm-10">
                <input type="text" name="heading" class="form-control name" placeholder="Heading" id="name" value="@if(isset($data->id)) {{$data->heading}} @endif" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="images" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="file" name="images"class="form-control files" placeholder="images" id="images" accept=".jpeg, .jpg, .png"  onchange="previewFiles(this);">
                <img id="previewImgs" src="<?php if(isset($data->id)){ echo url("public/images/".$data->image);}else{ ?>../public/img/image-preview.png<?php } ?>" alt="Placeholder" width="100px">
              </div>
            </div>
            <div class="row mb-3">
              <label for="videourl" class="col-sm-2 col-form-label">Video URL</label>
              <div class="col-sm-10">
                <input type="text" name="videourl" class="form-control videourl" placeholder="Video url" id="videourl" value="@if(isset($data->id)) {{$data->videourl}} @endif" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="info" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea name="info" id="info" cols="30" rows="5" class="form-control" placeholder="Description">@if(isset($data->id)) {{$data->description}} @endif</textarea>
              </div>
            </div>            
            <div class="row mb-3">
              <label for="postedBy" class="col-sm-2 col-form-label">Created By</label>
              <div class="col-sm-10">
                <input type="text" name="postedBy" class="form-control" placeholder="Created By" id="postedBy" value="@if(isset($data->id)) {{$data->postedBy}} @endif" required>               
              </div>
            </div>
            <div class="row mb-3">
              <label for="postedDate" class="col-sm-2 col-form-label">Created Date</label>
              <div class="col-sm-10">
                <input type="date" name="postedDate" class="form-control" placeholder="Created Date" id="postedDate" value="<?php if(isset($data->id)){echo $data->postedDate; } ?>" required>               
              </div>
            </div> 
            <div class="row mb-3">
              <label for="instagram" class="col-sm-2 col-form-label">Type</label>
              <div class="col-sm-10">
                <input type="radio" id="news" name="type" value="1" <?php if(isset($data->id)){ if($data->type==1){echo "checked"; }}else{ ?>checked<?php } ?> >
                <label for="news">News</label>
                <input type="radio" id="review" name="type" value="2" <?php if(isset($data->id)){ if($data->type==2){echo "checked"; }} ?>>
                <label for="review">Review</label>
                <input type="radio" id="video" name="type" value="3" <?php if(isset($data->id)){ if($data->type==3){echo "checked"; }} ?>>
                <label for="video">Video</label>
                <input type="radio" id="event" name="type" value="4" <?php if(isset($data->id)){ if($data->type==4){echo "checked"; }} ?>>
                <label for="event">Event</label>             
              </div>
            </div>     
            
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <input type="hidden" class="id" name="id" value="@if(isset($data->id)) {{$data->id}} @endif">
                <button type="button" class="btn btn-primary submitdata">Submit</button>
              </div>
              <div class="alert alert-success text-center hide1"><span class="msg_success"></span></div>
              <div class="alert alert-danger text-center hide2"><span class="msg_danger"></span></div>
            </div>
            </form><!-- End Horizontal Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
    $('.submitdata').click(function(){
        var name  = $('.name').val();        
        if(name==''){
            $('.name').css('border','1px solid red');
        }else{
            $('.name').css('border','');
            $.ajax({
                type:'POST',
                url:'{{url("/admin/insert_magazine")}}',
                data  :new FormData( $("#saveform")[0] ),
                async   : false,
                cache   : false,
                contentType : false,
                processData : false,
                success:function(data){
                  console.log(data);
                  if($.trim(data)=="1"){
                  $('.hide1').css('display','block');
                  $('.msg_success').text("Sucessfully submitted");
                  $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                      window.location.href="{{URL::to('/admin/magazine')}}";
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


@include('admin.includes.footer')