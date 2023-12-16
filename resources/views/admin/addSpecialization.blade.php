@include('admin.header')
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
                                                <div class>
                                                    <label>Specialization Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Specialization Name">
                                                </div>
                                                <div class>
                                                    <label>Image</label>
                                                    <input type="file" class="form-control file" name="file" onchange="previewFile(this);">
                                                    <img id="previewImg" src="/examples/images/transparent.png" alt="Placeholder" width="100px">
                                                </div>
                                                <div class>
                                                    <label>Description</label>
                                                    <textarea class="form-control description" name="description" placeholder="Description" id="description"></textarea>
                                                </div>
                                                
                                                <button type="button" class="btn_1 full_width text-center submitdata">Submit</button>
                                               
                                               
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

var myEditor;

ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( 'Editor was initialized', editor );
        myEditor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
</script>
        <script>
            $('.submitdata').click(function(){
                var name  = $('.name').val();
                var file = $('.file').val();
                var description = myEditor.getData();
                if(name='' || name.length<5){
                    $('.name').css('border','1px solid red');
                }else if(!file){
                    $('.name').css('border','');
                    $('.file').css('border','1px solid red');
                }else if(description='' || description.length<20){
                    $('.name').css('border','');
                    $('.file').css('border','');
                    $('.ck-editor').css('border','1px solid red');
                }else{
                    $('.name').css('border','');
                    $('.file').css('border','');
                    $('.ck-editor').css('border','');
                    $.ajax({
                        type:'POST',
                        url:'{{url("/insert_specialization")}}',
                        data  :new FormData( $("#saveform")[0] ),
                        async   : false,
                        cache   : false,
                        contentType : false,
                        processData : false,
                        success:function(data){
                            console.log(data);
                            if($.trim(data)=="done"){
                            $('.hide1').css('display','block');
                            $('.msg_success').text("Sucessfully Updated");
                            $(".alert-success").show('slow' , 'linear').delay(4000).fadeOut(function(){
                               // window.location.href="{{URL::to('admin/blog')}}";
                            });

                            }
                            if($.trim(data)=="name_err"){
                            $('.hide2').css('display','block');
                            $('.msg_danger').text("Name already exist");
                            $(".alert-danger").show('slow' , 'linear').delay(4000).fadeOut();

                            }
                        }
                        
                    });
                }
            })
        </script>
@include('admin.footer')