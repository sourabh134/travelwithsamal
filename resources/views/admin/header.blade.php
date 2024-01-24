<!DOCTYPE html>
<html lang="zxx">
  <!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 06:15:57 GMT -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap1.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/themefy_icon/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/niceselect/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/owl_carousel/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/gijgo/gijgo.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/font_awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/tagsinput/tagsinput.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/datepicker/date-picker.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/vectormap-home/vectormap-2.0.2.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/scroll/scrollable.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/datatable/css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/datatable/css/responsive.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/datatable/css/buttons.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/text_editor/summernote-bs4.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/morris/morris.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendors/material_icon/material-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/style1.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/css/colors/default.css')}}" id="colorSkinCSS">
    <script src="{{asset('public/assets/js/jquery1-3.4.1.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <style>
      .displaynone{display:none !important;}
      .hide1{display:none;}
      .hide2{display:none;}
      i.fa-trash{color:red}
    </style>
  </head>
  <body class="crm_body_bg">
    <nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
      <div class="logo d-flex justify-content-between">
        <a href="{{url('/dashboard')}}">
          <img src="{{ asset("public/assets/img/logo2.png") }}" alt>
        </a>
        <div class="sidebar_close_icon d-lg-none">
          <i class="ti-close"></i>
        </div>
      </div>
      <ul id="sidebar_menu">
        <li class="mm-active">
          <a class="" href="{{url('/dashboard')}}" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/dashboard.svg')}}" alt>
            </div>
            <span>Dashboard</span>
          </a>
          <!-- <ul>
            <li>
              <a class="active" href="index-2.html">Sales</a>
            </li>
            <li>
              <a href="index_2.html">Default</a>
            </li>
            <li>
              <a href="index_3.html">Dark Menu</a>
            </li>
          </ul> -->
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/2.svg')}}" alt>
            </div>
            <span>Master</span>
          </a>
          <ul>
            <li>
              <a href="{{url('/specialization')}}">Specialization</a>
            </li>            
            <li>
              <a href="{{url('/treatments')}}">Treatmeants</a>
            </li>
            <li>
              <a href="{{url('/hospitals')}}">Hospitals</a>
            </li>
            <li>
              <a href="{{url('/doctors')}}">Doctors</a>
            </li>
            <li>
              <a href="{{url('/blogs')}}">Blog</a>
            </li>
            <li>
              <a href="{{url('/patients')}}">Patient</a>
            </li> 
            <li>
              <a href="{{url('/complaints')}}">Complaint</a>
            </li>
            <li>
              <a href="{{url('/patientContact')}}">Contact Inquiries</a>
            </li>
            <li>
              <a href="{{url('/testimonials')}}">Testimonials</a>
            </li>
            <li>
              <a href="{{url('/Notification')}}">Send Notifications</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/3.svg')}}" alt>
            </div>
            <span>Others</span>
          </a>
          <ul>
            <li>
              <a href="{{url('/tearmCondition')}}">T&C</a>
            </li>
            <li>
              <a href="{{url('/privacyPolicy')}}">Privacy & Policy</a>
            </li>
            <li>
              <a href="buttons.html">Buttons</a>
            </li>
            <li>
              <a href="modal.html">modal</a>
            </li>
            <li>
              <a href="dropdown.html">Droopdowns</a>
            </li>
            <li>
              <a href="Badges.html">Badges</a>
            </li>
            <li>
              <a href="Loading_Indicators.html">Loading Indicators</a>
            </li>
            <li>
              <a href="State_color.html">State color</a>
            </li>
            <li>
              <a href="typography.html">Typography</a>
            </li>
            <li>
              <a href="datepicker.html">Date Picker</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/4.svg')}}" alt>
            </div>
            <span>forms</span>
          </a>
          <ul>
            <li>
              <a href="Basic_Elements.html">Basic Elements</a>
            </li>
            <li>
              <a href="Groups.html">Groups</a>
            </li>
            <li>
              <a href="Max_Length.html">Max Length</a>
            </li>
            <li>
              <a href="Layouts.html">Layouts</a>
            </li>
          </ul>
        </li>
        <li class>
          <a href="Board.html" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/5.svg')}}" alt>
            </div>
            <span>Board</span>
          </a>
        </li>
        <li class>
          <a href="invoice.html" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/6.svg')}}" alt>
            </div>
            <span>Invoice</span>
          </a>
        </li>
        <li class>
          <a href="calender.html" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/7.svg')}}" alt>
            </div>
            <span>Calander</span>
          </a>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/8.svg')}}" alt>
            </div>
            <span>Products</span>
          </a>
          <ul>
            <li>
              <a href="Products.html">Products</a>
            </li>
            <li>
              <a href="Product_Details.html">Product Details</a>
            </li>
            <li>
              <a href="Cart.html">Cart</a>
            </li>
            <li>
              <a href="Checkout.html">Checkout</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/8.svg')}}" alt>
            </div>
            <span>Icons</span>
          </a>
          <ul>
            <li>
              <a href="Fontawesome_Icon.html">Fontawesome Icon</a>
            </li>
            <li>
              <a href="themefy_icon.html">themefy icon</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/9.svg')}}" alt>
            </div>
            <span>Animations</span>
          </a>
          <ul>
            <li>
              <a href="wow_animation.html">Animate</a>
            </li>
            <li>
              <a href="Scroll_Reveal.html">Scroll Reveal</a>
            </li>
            <li>
              <a href="tilt.html">Tilt Animation</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/10.svg')}}" alt>
            </div>
            <span>Components</span>
          </a>
          <ul>
            <li>
              <a href="accordion.html">Accordions</a>
            </li>
            <li>
              <a href="Scrollable.html">Scrollable</a>
            </li>
            <li>
              <a href="notification.html">Notifications</a>
            </li>
            <li>
              <a href="carousel.html">Carousel</a>
            </li>
            <li>
              <a href="Pagination.html">Pagination</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/11.svg')}}" alt>
            </div>
            <span>Table</span>
          </a>
          <ul>
            <li>
              <a href="data_table.html">Data Tables</a>
            </li>
            <li>
              <a href="bootstrap_table.html">Bootstrap</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/12.svg')}}" alt>
            </div>
            <span>Cards</span>
          </a>
          <ul>
            <li>
              <a href="basic_card.html">Basic Card</a>
            </li>
            <li>
              <a href="theme_card.html">Theme Card</a>
            </li>
            <li>
              <a href="dargable_card.html">Draggable Card</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/13.svg')}}" alt>
            </div>
            <span>Charts</span>
          </a>
          <ul>
            <li>
              <a href="chartjs.html">ChartJS</a>
            </li>
            <li>
              <a href="apex_chart.html">Apex Charts</a>
            </li>
            <li>
              <a href="chart_sparkline.html">Chart sparkline</a>
            </li>
            <li>
              <a href="am_chart.html">am-charts</a>
            </li>
            <li>
              <a href="nvd3_charts.html">nvd3 charts.</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/14.svg')}}" alt>
            </div>
            <span>Widgets</span>
          </a>
          <ul>
            <li>
              <a href="chart_box_1.html">Chart Boxes 1</a>
            </li>
            <li>
              <a href="profilebox.html">Profile Box</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/15.svg')}}" alt>
            </div>
            <span>Maps</span>
          </a>
          <ul>
            <li>
              <a href="mapjs.html">Maps JS</a>
            </li>
            <li>
              <a href="vector_map.html">Vector Maps</a>
            </li>
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="{{asset('public/assets/img/menu-icon/16.svg')}}" alt>
            </div>
            <span>Pages</span>
          </a>
          <ul>
            <li>
              <a href="login.html">Login</a>
            </li>
            <li>
              <a href="resister.html">Register</a>
            </li>
            <li>
              <a href="error_400.html">Error 404</a>
            </li>
            <li>
              <a href="error_500.html">Error 500</a>
            </li>
            <li>
              <a href="forgot_pass.html">Forgot Password</a>
            </li>
            <li>
              <a href="gallery.html">Gallery</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <section class="main_content dashboard_part large_header_bg">
      <div class="container-fluid g-0">
        <div class="row">
          <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
              <div class="sidebar_icon d-lg-none">
                <i class="ti-menu"></i>
              </div>
              <div class="serach_field-area d-flex align-items-center">
                <div class="search_inner">
                  <!-- <form action="#">
                    <div class="search_field">
                      <input type="text" placeholder="Search here...">
                    </div>
                    <button type="submit">
                      <img src="../assets/img/icon/icon_search.svg" alt>
                    </button>
                  </form> -->
                </div>
                <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
              </div>
              <div class="header_right d-flex justify-content-between align-items-center">
                <div class="header_notification_warp d-flex align-items-center">
                  <!-- <li>
                    <a class="bell_notification_clicker nav-link-notify" href="#">
                      <img src="../assets/img/icon/bell.svg" alt>
                    </a>
                    <div class="Menu_NOtification_Wrap">
                      <div class="notification_Header">
                        <h4>Notifications</h4>
                      </div>
                      <div class="Notification_body">
                        <div class="single_notify d-flex align-items-center">
                          <div class="notify_thumb">
                            <a href="#">
                              <img src="../assets/img/staf/2.png" alt>
                            </a>
                          </div>
                          <div class="notify_content">
                            <a href="#">
                              <h5>Cool Marketing </h5>
                            </a>
                            <p>Lorem ipsum dolor sit amet</p>
                          </div>
                        </div>
                        <div class="single_notify d-flex align-items-center">
                          <div class="notify_thumb">
                            <a href="#">
                              <img src="../assets/img/staf/4.png" alt>
                            </a>
                          </div>
                          <div class="notify_content">
                            <a href="#">
                              <h5>Awesome packages</h5>
                            </a>
                            <p>Lorem ipsum dolor sit amet</p>
                          </div>
                        </div>
                        <div class="single_notify d-flex align-items-center">
                          <div class="notify_thumb">
                            <a href="#">
                              <img src="../assets/img/staf/3.png" alt>
                            </a>
                          </div>
                          <div class="notify_content">
                            <a href="#">
                              <h5>what a packages</h5>
                            </a>
                            <p>Lorem ipsum dolor sit amet</p>
                          </div>
                        </div>
                        <div class="single_notify d-flex align-items-center">
                          <div class="notify_thumb">
                            <a href="#">
                              <img src="../assets/img/staf/2.png" alt>
                            </a>
                          </div>
                          <div class="notify_content">
                            <a href="#">
                              <h5>Cool Marketing </h5>
                            </a>
                            <p>Lorem ipsum dolor sit amet</p>
                          </div>
                        </div>
                        <div class="single_notify d-flex align-items-center">
                          <div class="notify_thumb">
                            <a href="#">
                              <img src="../assets/img/staf/4.png" alt>
                            </a>
                          </div>
                          <div class="notify_content">
                            <a href="#">
                              <h5>Awesome packages</h5>
                            </a>
                            <p>Lorem ipsum dolor sit amet</p>
                          </div>
                        </div>
                        <div class="single_notify d-flex align-items-center">
                          <div class="notify_thumb">
                            <a href="#">
                              <img src="../assets/img/staf/3.png" alt>
                            </a>
                          </div>
                          <div class="notify_content">
                            <a href="#">
                              <h5>what a packages</h5>
                            </a>
                            <p>Lorem ipsum dolor sit amet</p>
                          </div>
                        </div>
                      </div>
                      <div class="nofity_footer">
                        <div class="submit_button text-center pt_20">
                          <a href="#" class="btn_1">See More</a>
                        </div>
                      </div>
                    </div>
                  </li> -->
                  <!-- <li>
                    <a class="CHATBOX_open nav-link-notify" href="#">
                      <img src="../assets/img/icon/msg.svg" alt>
                    </a>
                  </li> -->
                </div>
                <?php $admin=App\Models\Admin::find(1);?>
                <div class="profile_info">
                  <img src="{{asset('public/images/admin')}}/{{$admin->logo}}" alt="#">
                  <div class="profile_info_iner">
                    <div class="profile_author_name">
                      <p><?= $admin->name ?> </p>
                      <!-- <h5>Dr. Robar Smith</h5> -->
                    </div>
                    <div class="profile_info_details">
                      <a href="{{url('adminProfile')}}">My Profile </a>
                      <a href="{{url('changPassword')}}">Settings</a>
                      <a href="{{url('/logout')}}">Log Out </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>