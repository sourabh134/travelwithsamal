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
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Hospital Name" value="<?php if(isset($data->id)){ echo $data->name;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Established in</label>
                                                    <select class="form-select" name="established">
                                                        <option value="">Choose</option>
                                                        @foreach($years as $yearvalue)
                                                        <option value="{{$yearvalue}}" <?php if(isset($data->id)){ if($value->id == $data->specialityId){ echo"selected"; }} ?>>{{$yearvalue}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Specialities</label>
                                                    <select class="form-select" name="specialityId">
                                                        <option value="">Choose</option>
                                                        @foreach($specialization as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->specialityId){ echo"selected"; }} ?>>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Treatmeant</label>
                                                    <select class="form-select" name="specialityId">
                                                        <option value="">Choose</option>
                                                        @foreach($treatmeant as $treatmeantvalue)
                                                        <option value="{{$treatmeantvalue->id}}" <?php if(isset($data->id)){ if($value->id == $data->specialityId){ echo"selected"; }} ?>>{{$treatmeantvalue->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control email" name="email" placeholder="Email" value="<?php if(isset($data->id)){ echo $data->name;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control password" name="password" placeholder="Password" value="<?php if(isset($data->id)){ echo $data->name;} ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-select" name="country" id="country">
                                                        <option value="">Choose</option>
                                                        @foreach($country as $countryvalue)
                                                        <option value="{{$countryvalue->id}}" <?php if(isset($data->id)){ if($value->id == $data->specialityId){ echo"selected"; }} ?>>{{$countryvalue->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select class="form-select" name="state" id="state">
                                                        <option value="">Choose</option>
                                                        @foreach($specialization as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->specialityId){ echo"selected"; }} ?>>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <select class="form-select" name="city" id="city">
                                                        <option value="">Choose</option>
                                                        @foreach($specialization as $value)
                                                        <option value="{{$value->id}}" <?php if(isset($data->id)){ if($value->id == $data->specialityId){ echo"selected"; }} ?>>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea name="address" placeholder="Address" class="form-control address"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" class="form-control file" name="image" onchange="previewFile(this);" multiple >
                                                    <img id="previewImg" src="<?php if(isset($data->id)){ echo "../images/".$data->image;}else{ ?>../assets/img/image-preview.png<?php } ?>" alt="Placeholder" width="100px">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control description" name="description" placeholder="Description" id="description"><?php if(isset($data->id)){ echo $data->description;} ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>About</label>
                                                    <textarea class="form-control about" name="about" placeholder="about" id="about"><?php if(isset($data->id)){ echo $data->content;} ?></textarea>
                                                    <textarea class="displaynone" id="abouts" name="abouts"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Infrastructure</label>
                                                    <textarea class="form-control infrastructure" name="infrastructure" placeholder="Infrastructure" id="infrastructure"><?php if(isset($data->id)){ echo $data->content;} ?></textarea>
                                                    <textarea class="displaynone" id="infrastructures" name="infrastructures"></textarea>
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

var myEditor;

ClassicEditor
    .create( document.querySelector( '#infrastructure' ) )
    .then( editor => {
        console.log( 'Editor was initialized', editor );
        myEditor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
</script>
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
        var name  = $('.name').val();
        var file = $('.file').val();
        var id = $('.id').val();
        var description = myEditor.getData();
        var about = myEditors.getData();
        if(name=='' || name.length<5){
            $('.name').css('border','1px solid red');
        }else if(id=="" && file==""){                    
            $('.name').css('border','');
            $('.file').css('border','1px solid red');                   
        }else if(description=='' || description.length<20){
            $('.name').css('border','');
            $('.file').css('border','');
            $('.ck-editor').css('border','1px solid red');
        }else{
            $('.name').css('border','');
            $('.file').css('border','');
            $('.ck-editor').css('border','');
            $('#content').val(description);
            $('#abouts').val(about);
            //alert(description);
            $.ajax({
                type:'POST',
                url:'{{url("/insert_treatmeants")}}',
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
                        window.location.href="{{URL::to('/treatments')}}";
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
@include('admin.footer')