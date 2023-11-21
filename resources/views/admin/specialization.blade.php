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
                        <div class="box_right d-flex lms_block">
                           <div class="serach_field_2">
                              <div class="search_inner">
                                 <!-- <form Active="#">
                                    <div class="search_field">
                                    <input type="text" placeholder="Search content here...">
                                    </div>
                                    <button type="submit"> <i class="ti-search"></i> </button>
                                    </form> -->
                              </div>
                           </div>
                           <div class="add_button ms-2">
                              <a type="button" data-toggle="modal" data-target="#myModal" class="btn_1">Add New</a>
                           </div>
                        </div>
                     </div>
                     <div class="QA_table mb_30">
                        <table class="table lms_table_active">
                           <thead>
                              <tr>
                                 <th scope="col">Name</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                 <td><a href="#" class="status_btn">Active</a></td>
                                 <td><a href="#"><i class="fa fa-edit"></i></a> | <a href="#"><i class="fa fa-trash"></i></a></td>
                              </tr>
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                 <td><a href="#" class="status_btn">Active</a></td>
                                 <td><a href="#"><i class="fa fa-edit"></i></a> | <a href="#"><i class="fa fa-trash"></i></a></td>
                              </tr>
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@include('admin.footer') 