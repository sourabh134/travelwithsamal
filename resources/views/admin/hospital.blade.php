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
                              <a type="button" class="btn_1 addmodel" data-id="myModal">Add New</a>
                           </div>
                        </div>
                     </div>
                     <div class="QA_table mb_30">
                        <table class="table lms_table_active dataTable">
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
        <h4 class="modal-title">Hospital</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <label>Name</label>
         <input type="text" class="form-control" id="Name" name="name">
        </div>
        <div class="form-group">
         <label>Specialization</label>
         <select class="form-select" name="specialization">
            <option value="">Choose</option>

         </select>
        </div>
        <div class="form-group">
         <label>Country</label>
         <select class="form-select" name="country">
            <option value="">Choose</option>

         </select>
        </div>
        <div class="form-group">
         <label>State</label>
         <select class="form-select" name="state">
            <option value="">Choose</option>

         </select>
        </div>
        <div class="form-group">
         <label>City</label>
         <select class="form-select" name="city">
            <option value="">Choose</option>

         </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </div>
</div>
@include('admin.footer') 
