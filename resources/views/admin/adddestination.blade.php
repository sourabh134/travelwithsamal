
@include('admin.includes.header')

<div class="main_content_iner overly_inner ">
  <div class="container-fluid p-0 ">
    <div class="row">
      <div class="col-12">
        <div class="page_title_box d-flex align-items-center justify-content-between">
          <div class="page_title_left">
            <h4 class="f_s_30 f_w_700 text_white"><?php if(isset($banner)){ echo "Update"; }else{ echo "Add"; } ?> Banner</h4>
            <ol class="breadcrumb page_bradcam mb-0">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/banners') }}">Banners</a></li>
              <li class="breadcrumb-item active"><?php if(isset($banner)){ echo "Update"; }else{ echo "Add"; } ?> Banner</li>
            </ol>
          </div>
          <!-- @if(Session::has('message'))
          <p class="alert alert-success"><span style="font-weight: 600;"> Success !! </span>{{ Session::get('message') }}</p>
          @endif -->
          <p class="alert alert-success" style="display:none" id="msg"></p>
          
          <!-- <a href="#" class="white_btn3">Create Report</a>style="border: 1px solid #d7d7d7;" -->
        </div>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body p-5">
            <!-- <h2 class="card-title text-center pb-5"><?php if(isset($data)){ echo "Update"; }else{ echo "Add"; } ?> Banner</h2> -->
            <form id="formData" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Heading</label>
              <div class="col-sm-10">
                <input type="text" name="heading" class="form-control" placeholder="Heading" id="name" value="<?php if(isset($data)){ echo $data->heading; } ?>">
                <div class="text-danger" id="name_error"></div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Sub Heading</label>
              <div class="col-sm-10">
                <input type="text" name="subheading" class="form-control" placeholder="Sub Heading" id="name" value="<?php if(isset($data)){ echo $data->subheading; } ?>">
                <div class="text-danger" id="name_error"></div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="start_date" class="col-sm-2 col-form-label">Discription</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="discription"><?php if(isset($data)){ echo $data->discription; } ?></textarea>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
              <input type="hidden" name="banner_id" id="banner_id" value="<?php if(isset($data)){ echo $data->id; } ?>">
                <button type="button" onclick="get_form_data()" class="btn btn-primary">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  function get_form_data(){
    // var file = $('#image')[0].files[0]
    // alert(Math.round(file.size/(1024*1024)));
    // if(Math.round(file.size/(1024*1024)) > 2){ // make it in MB so divide by 1024*1024
    //     alert('Please select image size less than 2 MB');
    //     return false;
    // }
    // return false;
    $.ajax({  
      type:"POST",
      url:"{{url('admin/insertdestination')}}",
      data:new FormData( $("#formData")[0]),
      async : false,
      contentType : false,
      cache : false,
      processData: false,
      success:function(data)
      {
        if($.trim(data)=="update")
        { 
          $(window).scrollTop(0);
          $('#msg').show();
          $("#msg").html('<span style="font-weight: 600;"> Success !! </span> Updated successfully.');
          $('#image_error').html('');
          $('#name_error').html('');
          $('#start_date_error').html('');
          $('#end_date_error').html('');
          setTimeout(() => {
            window.location.href = "<?php echo url('admin/destination'); ?>";
          }, 5000);
        }
        else if($.trim(data)=="add")
        {
          $(window).scrollTop(0);
          $('#msg').show();
          $("#msg").html('<span style="font-weight: 600;"> Success !! </span> Added successfully.');
          $('#formData')[0].reset();
          $('#image_error').html('');
          $('#name_error').html('');
          $('#start_date_error').html('');
          $('#end_date_error').html('');
          setTimeout(() => {
            window.location.href = "<?php echo url('admin/destination'); ?>";
          }, 5000);
        }else{
          var obj=JSON.parse(data);
          if(obj.image){
            $('#image_error').html(obj.image);
            $('#name_error').html('');
            $('#start_date_error').html('');
            $('#end_date_error').html('');
          }else if(obj.name){
            $('#image_error').html('');
            $('#name_error').html(obj.name);
            $('#start_date_error').html('');
            $('#end_date_error').html('');
          }else if(obj.start_date){
            $('#image_error').html('');
            $('#name_error').html('');
            $('#start_date_error').html(obj.start_date);
            $('#end_date_error').html('');
          }else if(obj.end_date){
            $('#image_error').html('');
            $('#name_error').html('');
            $('#start_date_error').html('');
            $('#end_date_error').html(obj.end_date);
          }
        }
      }  
      
    });
  }
</script>

@include('admin.includes.footer')