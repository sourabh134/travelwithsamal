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
                                        <!-- <div class="modal-header theme_bg_1 justify-content-center">
                                            <h5 class="modal-title text_white">Resister</h5>
                                        </div> -->
                                        <div class="modal-body">
                                            <!-- <form>                                            -->
                                                <div class="form-group">
                                                    <label>Doctor Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Hospital Name" value="<?php if(isset($doctor->id)){ echo $doctor->doc_name;} ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Hospital Name" value="<?php if(isset($doctor->id)){ echo $doctor->hosp_name;} ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Specialities</label>
                                                    
                                                <select class="form-select specialities" name="specialityId[]" multiple disabled style="background-color: white;">
                                                        <?php 
                                                        $specialities_ids = explode(',', $doctor->speciality_id);
                                                        for ($i = 0; $i < count($specialities_ids); $i++) {
                                                                $speciality_name = App\Models\Specialization::where('id', $specialities_ids[$i])->first()->name;
                                                            
                                                        ?>
                                                        <option>{{$speciality_name}}</option>
                                                    <?php }?>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control email" name="email" placeholder="Email" value="<?php if(isset($doctor->id)){ echo $doctor->doc_email;} ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control password" name="password" placeholder="Password" value="<?php if(isset($doctor->id)){ echo $doctor->doc_password;} ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nationality</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Hospital Name" value="<?php if(isset($doctor->id)){ echo $doctor->county_name;} ?>" readonly>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea name="address" rows="2" placeholder="Address" class="form-control address" readonly><?php if(isset($doctor->id)){echo $doctor->address;}?></textarea>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <div class="upload__box">
                                                        <div class="alert alert-success text-center hide1">Success!! <span class="msg_success"></span></div>
                                                        <label>Doctor Image</label>
                                                        <div class="upload__img-wrap">
                                                            <?php if(isset($doctor->id)){ ?>
                                                                   <div>
                                                                    <img id="previewImg" src="{{asset('public/images/doctor/')}}/{{$doctor->doc_image}}" alt="Placeholder" width="175px" height="180px">
                                                                    <!-- <button class="deleteHos" data-id="{{$doctor->id}}"> Delete</button> -->
                                                                </div>
                                                              
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <textarea class="form-control description" name="description" id="description" readonly><?php if(isset($doctor->id)){ echo $doctor->designation;} ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>About</label>
                                                    <textarea class="form-control about" name="about" placeholder="about" id="about" readonly><?php if(isset($doctor->id)){ echo $doctor->about;} ?></textarea>
                                                    <textarea class="displaynone" id="abouts" name="abouts" readonly></textarea>
                                                </div>
                                                
                                               
                                            <!-- </form> -->
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
<script type="text/javascript">
    $(".deleteHos").click(function(){
        alert()
    var id = $(this).data('id');
    var token = "<?=csrf_token()?>";
    if(confirm("Are you sure want to delete this?")){
      $.ajax({
          type:'POST',
          url:'{{url("/delete_hospitalImage")}}',
          data  :{id:id,_token:token},          
          success:function(data){
            console.log(data)
            if($.trim(data)=="done"){
                $('.hide1').css('display','block');
                $('.msg_success').text("Hospital Image Deleted");
                $(".alert-success").show('slow' , 'linear').delay(2000).fadeOut(function(){
                    location.reload();
                });

            }
            
          }
          
      });
    }    
  })
</script>
@include('admin.footer')