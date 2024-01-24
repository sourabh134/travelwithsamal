@include('admin.header')
<div class="main_content_iner ">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_header">
            <div class="box_header m-0">
              <div class="main-title">
                <h3 class="m-0">{{$title}}</h3>
              </div>
            </div>
          </div>
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header">
                <h4></h4>
                @if(Session::has('success'))
                <div class="alert alert-success text-center" style="margin-right: -400px;">Success!! <span class="msg_success">{{Session::get('success')}}</span></div>
                @endif
                <div class="box_right d-flex lms_block">
                  <div class="serach_field_2">

                    <div class="search_inner">
                      <!-- <form Active="#"><div class="search_field"><input type="text" placeholder="Search content here..."></div><button type="submit"><i class="ti-search"></i></button></form> -->

                    </div>
                  </div>
                  <div class="add_button ms-2">
                    <a href="{{url('/addHospital')}}" class="btn_1">Add New</a>
                  </div>
                </div>
              </div>
              <div class="QA_table mb_30">
                <table class="table lms_table_active ">
                  <thead>
                    <tr>
                      <th scope="col">S.No.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Content</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    @php
                    $i=1
                    @endphp
                    @foreach($hospital as $key=> $value)
                    <tr>
                      <td>{{++$key}}</td>
                      <td><a href="{{url('hospitalDetail?key='.base64_encode($value->id))}}">{{$value->hosp_name}}</a></td>
                        
                      <td><?=substr($value->hosp_about,0,30)?>...</td>                      
                      <td>
                        <?php if($value->status==1){?>
                        <a href="{{url('hosp_status?key='.base64_encode($value->id))}}" class="status_btn">Active</a>
                      <?php }else {?>
                        <a href="{{url('hosp_status?key='.base64_encode($value->id))}}" class="status_btn" style="background:#d32b05">In-active</a>
                      <?php } ?>

                      </td>
                      <td><a href="{{url('/addHospital?key='.base64_encode($value->id))}}"><i class="fa fa-edit"></i></a> | <a class="delete" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12"></div>
    </div>
  </div>
</div>
<script>
  $(".delete").click(function(){
    var id = $(this).data('id');
    var token = "<?=csrf_token()?>";
    if(confirm("Are you sure want to delete this?")){
      $.ajax({
          type:'POST',
          url:'{{url("/delete_hospital")}}',
          data  :{id:id,_token:token},          
          success:function(data){
            location.reload();
          }
          
      });
    }    
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".alert-success").fadeOut(800);
  });
</script>
 @include('admin.footer')