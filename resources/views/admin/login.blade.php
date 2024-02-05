<!DOCTYPE html>
<html lang="zxx">
   <!-- Mirrored from demo.dashboardpack.com/sales-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 06:17:20 GMT -->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin Login</title>
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap1.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/vendors/themefy_icon/themify-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/vendors/font_awesome/css/all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/vendors/scroll/scrollable.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/css/metisMenu.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/style1.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/css/colors/default.css') }}" id="colorSkinCSS">
    </head>
    <style>
        .appName {
            text-align: center;
            margin: 40px 0px 20px 0px;
        }
        input.btn_1.full_width.text-center {
            background-color: #FFE600;
            color: #000000;
            border-radius: 5px;
            cursor: pointer;
        }
        /* img {
            margin: 75px 0px 25px 115px;
            border: 2px solid #ffe600;
            border-radius: 50%;
        } */
        body{
            background-image: url("{{ asset('public/img/login/login.jpg') }}");
            background-color: #000000;
            background-repeat: no-repeat;
            background-position: 6% 56%;
        }
        .loginForm {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .loginForm .cs_modal .modal-body {
            background: #f7faff;
        }
        .loginForm .btn_1:hover {
            color: #000000;
            background-color: #FFE600;
            box-shadow: 0 2px 5px #00000052;
        }
        .loginForm .cs_modal .modal-body .btn_1 {
            width: 100%;
            display: block;
            margin-top: 20px;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .loginForm .cs_modal .modal-body input, .loginForm .cs_modal .modal-body .nice_Select {
            border: 1px solid #e1e3e5;
        }
    </style>
    <body>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="loginForm">
                    <!-- <h1 class="appName">Gearz App</h1> -->
                    <div class="modal-content cs_modal">
                        <div class="modal-header justify-content-center">
                        <img src="{{ url('public/img/logo-black.png') }}" alt="Logo">
                        <!-- <h5 class="modal-title text_white">Admin Login</h5> -->
                        </div>
                        <div class="modal-body">                        
                        <form action="{{ url('admin/login') }}" method="post" onsubmit="return validate();">
                            @csrf
                            <div class>
                                <input type="text" name="username" class="form-control username" placeholder="Username">
                            </div>
                            <div class>
                                <input type="password" name="password" class="form-control password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn_1 full_width text-center">Log in</button>
                            @if(Session::has('message'))
                            <p class="alert alert-danger"><span style="font-weight: 600;"> Failed !! </span>{{ Session::get('message') }}</p>
                            @endif
                            <!-- <p>Need an account? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="#"> Sign Up</a></p>
                            <div class="text-center">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                            </div> -->
                        </form>
                        </div>
                    </div>
    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('public/js/jquery1-3.4.1.min.js') }}"></script>
        <script src="{{ asset('public/js/popper1.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.html') }}"></script>
        <script src="{{ asset('public/js/metisMenu.js') }}"></script>
        <script src="{{ asset('public/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('public/vendors/scroll/scrollable-custom.js') }}"></script>
        <script src="{{ asset('public/js/custom.js') }}"></script>
        <script>
            function validate(){
                var username = $('.username').val();
                var password = $('.password').val();
                if (!username){
                    $('.username').css('border', '2px solid red');
                    $('.password').css('border', '');
                    return false;
                } else if (!password){
                    $('.username').css('border', '');
                    $('.password').css('border', '2px solid red');
                    return false;
                }
            }
        </script>
        <script>
            $('.alert').fadeOut(6000);
        </script>
    </body>
   <!-- Mirrored from demo.dashboardpack.com/sales-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 06:17:20 GMT -->
</html>

