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
                                            <form>
                                                <div class = "form-group">
                                                    <label>Treatment Type</label>
                                                    <select class="form-select" name="type">
                                                        <option value="">Choose</option>

                                                    </select>
                                                </div>
                                                <div class = "form-group">
                                                    <label>Treatment Name</label>
                                                    <input type="text" class="form-control name" name="name" placeholder="Specialization Name">
                                                </div>
                                                <div class = "form-group">
                                                    <label>Image</label>
                                                    <input type="file" class="form-control file" name="file" onchange="previewFile(this);">
                                                    <img id="previewImg" src="/examples/images/transparent.png" alt="Placeholder" width="100px">
                                                </div>
                                                <div class = "form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control description" name="description" placeholder="Description" id="editor"></textarea>
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
            $('.submitdata').click(function(){
                var name  = $('.name').val();
                var = $('.').val();
                var = $('.').val();
            })
        </script>
@include('admin.footer')