@include('admin.includes.header')
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
            <div class="page_title_left">
                <h4 class="f_s_30 f_w_700 text_white">Destination</h4>
                <ol class="breadcrumb page_bradcam mb-0">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Destination</li>
                </ol>
            </div>
            @if(Session::has('message'))
            <p class="alert alert-success"><span style="font-weight: 600;"> Success !! </span>{{ Session::get('message') }}</p>
            @endif
            <p class="alert alert-success" style="display:none;" id="orderUpdateMsg">Order updated successfully !!</p>
            
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_20 ">
            
            <div class="white_card_body text-center">
                <div class="QA_table ">
                    <table class="table table-striped" id="example">
                        <thead class="">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Heading</th>
                                <th scope="col">Sub Heading</th>
                                <th scope="col">Discription</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="row_position">
                            @foreach($data as $key=>$value)
                            <tr id="<?php echo $value->id; ?>">                                
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->heading}}</td>
                                <td>{{ $value->subheading}}</td>
                                <td>{{ substr($value->discription,0,50)}}...</td>
                                <td><a href="{{ url('admin/addDistination?id=') }}{{ base64_encode($value->id) }}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>
<script type="text/javascript">
   $(".row_position").sortable({
      delay: 150,
      stop: function () {
         var selectedData = new Array();
         $(".row_position>tr").each(function(){
            selectedData.push($(this).attr("id"))
         });
         updateOrder(selectedData);
      }
   });
   function updateOrder(aData){
      var token = "<?php echo csrf_token(); ?>";
      $.ajax({
         url: "{{url('updateBannerOrder')}}",
         type: "POST",
         data: {allData:aData,_token:token},
         success: function(data){
                $(window).scrollTop(0);
                $("#orderUpdateMsg").show();
                $("#orderUpdateMsg").fadeOut(3000);
                setTimeout(() => {
                    location.reload();
                }, 3000);
         }
      });
   }
</script>


@include('admin.includes.footer')