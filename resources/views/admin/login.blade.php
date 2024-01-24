<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Travel With Samal</title>
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap1.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/themefy_icon/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/font_awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/scroll/scrollable.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/style1.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/css/colors/default.css')}}" id="colorSkinCSS">
    <!-- {{asset('public/image/front/css/bootstrap.min.css')}} -->
    <style>
        .main_content {
            padding-left: 0px;
        }
        .main_content .main_content_iner{
          background:none;
        }
        .footer_part {
          padding-left:0px;
        }
        .form-group.text-center.login-title h3 {
            font-size: 25px;
            font-weight: 600;
            margin-bottom: 29px;
        }
        .footer_part .footer_iner.text-center {
            background: #fff;
            padding: 10px 0;
            margin: 0 15px;
            border-radius: 5px;
            background: #4c869a;
        }
        body{
            background-image: url('{{ asset("public/assets/img/m.jpg") }}');
            background-color: #ffffff;
            background-repeat: no-repeat;
            background-position: 62% 54%;
        }
/* Ram       style="background-image:url('{{ asset("public/assets/img/background.jpg") }}');"*/

        /* .cs_modal .modal-header {
    background-color: #ffffff;
    padding: 23px 30px;
    border-bottom: 0 solid transparent;
} */
    </style>
  </head>
  <body class="crm_body_bg">
    
    <section class="main_content dashboard_part large_header_bg">
      <div class="main_content_iner ">
        <div class="container-fluid p-0">
          <div class="row justify-content-center">
            <div class="col-lg-12">
              <div class="mb_30">
                <div class="row justify-content-center">
                  <div class="col-lg-4">
                    <div class="modal-content cs_modal">
                      <div class="modal-header justify-content-center">
                        <img src="{{ asset("public/assets/img/logo2.png") }}" alt>
                      </div>
                      <div class="modal-body">
                        <div class="form-group text-center login-title">
                          <h3>Log in</h3>
                        </div>                        
                      <?php  if(Session::has('message')) { ?>
                        <p class="alert alert-danger"><?php echo Session::get('message'); ?></p>
                      <?php } ?>
                        <form action="{{url('/adminLogin')}}" method="post">
                           
                        @csrf
                          <div class>
                            <input type="text" class="form-control" placeholder="Enter your email" name="username">
                          </div>
                          <div class>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                          </div>
                          <button type="submit" class="btn_1 full_width text-center">Login</button>                                                   
                          <div class="text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                          </div>
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
      <div class="">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="footer_iner text-center">
                <p>{{date('Y')}} © Travel With Samal 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <script src="{{asset('public/assets/js/jquery1-3.4.1.min.js')}}"></script>
    <script src="{{asset('public/assets/js/popper1.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.min.html')}}"></script>
    <script src="{{asset('public/assets/js/metisMenu.js')}}"></script>
    <script src="{{asset('public/assets/vendors/scroll/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('public/assets/vendors/scroll/scrollable-custom.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
  </body>
  <!-- Mirrored from demo.dashboardpack.com/sales-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 06:17:20 GMT -->
</html>