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
                                                    <label>Patient Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Hospital Name" value="<?php if(isset($complaint->id)){ echo $complaint->name;} ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Doctor Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Hospital Name" value="<?php if(isset($complaint->id)){ echo $complaint->doc_name;} ?>" readonly>
                                                </div>
                                               
                                                
                                                <div class="form-group">
                                                    <label>Complaint Message</label>
                                                    <textarea name="address" rows="2" placeholder="Address" class="form-control address" readonly><?php if(isset($complaint->id)){echo $complaint->complaint_msg;}?></textarea>
                                                </div>

                                                <!-- <div class="form-group">
                                                    <label>About</label>
                                                    <textarea class="form-control about" name="about" placeholder="about" id="about" readonly><?php if(isset($complaint->id)){ echo $complaint->complaint_msg;} ?></textarea>
                                                    <textarea class="displaynone" id="abouts" name="abouts" readonly></textarea>
                                                </div> -->
                                                
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