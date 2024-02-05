<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="icon" type="image/x-icon" href="{{ url('public/img/logo-black.png') }}">
      <title>Admin</title>
      <link rel="stylesheet" href="{{ asset('public/css/bootstrap1.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/themefy_icon/themify-icons.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/niceselect/css/nice-select.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/owl_carousel/css/owl.carousel.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/gijgo/gijgo.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/font_awesome/css/all.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/tagsinput/tagsinput.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/datepicker/date-picker.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/vectormap-home/vectormap-2.0.2.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/scroll/scrollable.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/datatable/css/jquery.dataTables.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/datatable/css/responsive.dataTables.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/datatable/css/buttons.dataTables.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/text_editor/summernote-bs4.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/vendors/morris/morris.css') }}">
      <link rel="stylesheet" href="{{ asset('public/vendors/material_icon/material-icons.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/css/metisMenu.css') }}">
      <link rel="stylesheet" href="{{ asset('public/css/style1.css') }}" />
      <link rel="stylesheet" href="{{ asset('public/css/colors/default.css') }}" id="colorSkinCSS">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   </head>
   <style>
      #back-top a {
         color: #ffe600;
         background: #000;
      }
      .hide1{display:none;}
      .hide2{display:none;}
      i.fa.fa-trash {
         color: #e70202;
      }
      .form-check .form-check-input {
         float: none;
      }
      .form-check-input:checked {
         background-color: #000000;
         border-color: #000000;
      }
      table.dataTable tbody th, table.dataTable tbody td {
         padding: 16px 25px;
         font-size: 16px;
         color: #000;
         font-weight: 400;
      }
      tbody, td, tfoot, th, thead, tr {
         border-color: #0000003b;
         border-style: solid;
         border-width: 0;
      }
      .table>thead {
         vertical-align: bottom;
         background: #202020;
      }
      table.dataTable thead th, table.dataTable thead td {
         padding: 16px 25px;
         border: 0 solid transparent;
         font-size: 14px;
         font-weight: 500;
         color: #ffffff;
      }
      div.dt-buttons {
         position: relative;
         float: left;
         margin-bottom: 20px;
      }
      button.dt-button.buttons-excel.buttons-html5 {
         background: #30302e;
         color: #fff;
         font-size: 14px;
         border: 1px solid #30302e;
         transition:.6s;
      }
      button.dt-button.buttons-excel.buttons-html5:hover {
         background: #000000;
         color: #fff;
         font-size: 14px;
         border: 1px solid #000000;
      }
      .sidebar #sidebar_menu>li.mm-active>a {
         background: #000 !important;         
      }
      .sidebar #sidebar_menu>li a:hover{
         background: #000;         
      }
      
   </style>
   <body class="crm_body_bg">
      <nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
         <div class="logo d-flex justify-content-center">
            <a href="{{ url('admin/dashboard') }}"><img src="{{ url('public/img/logo-black.png') }}" alt="Logo"></a>
            <!-- <h2>Gearz App</h2> -->
            <div class="sidebar_close_icon d-lg-none">
               <i class="ti-close"></i>
            </div>
         </div>
         <ul id="sidebar_menu">
            <li class="mm-active">
               <a href="{{ url('admin/dashboard') }}">
                  <div class="icon_menu">
                     <i class="fa fa-book"></i>
                  </div>
                  <span>Dashboard</span>
               </a>
            </li>
            <!-- <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-asterisk"></i>
                  </div>
                  <span>Master</span>
               </a>
               <ul>
                  <li><a href="{{ url('admin/category') }}">Category</a></li>
                  <li><a href="{{ url('admin/serviceType') }}">Service Type</a></li>
                  <li><a href="#!">Staff</a></li>
                  <li><a href="#!">Notification</a></li>
                  <!-- <li><a href="{{ url('admin/popular_new_cars') }}">Resellers/Aagencies </a></li> --
               </ul>
            </li> -->
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-tag"></i>
                  </div>
                  <span>Banner</span>
               </a>
               <ul>
                  <li><a href="{{ url('admin/banners') }}">Banners</a></li>
                  <!-- <li><a href="{{ url('admin/popular_new_cars') }}">Popular New Cars</a></li> -->
                  <!-- <li><a href="{{ url('admin/welcome_images') }}">Welcome Images</a></li> -->
               </ul>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-tag"></i>
                  </div>
                  <span>Destination</span>
               </a>
               <ul>
                  <li><a href="{{ url('admin/destination') }}">Destination</a></li>
                  <li><a href="{{ url('admin/destinationimage') }}">Destination Image</a></li>
                  <!-- <li><a href="{{ url('admin/welcome_images') }}">Welcome Images</a></li> -->
               </ul>
            </li>
            <li class>
               <a href="{{ url('admin/destination') }}">
                  <div class="icon_menu">
                     <i class="fa fa-list"></i>
                  </div>
                  <span>Destination</span>
               </a>
            </li>
            <li class>
               <a href="{{ url('admin/popularBrands') }}">
                  <div class="icon_menu">
                     <i class="fa fa-fire"></i>
                  </div>
                  <span>Popular Brands</span>
               </a>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-user"></i>
                  </div>
                  <span>Agents/Resellers</span>
               </a>
               <ul>
                  <li><a href="{{ url('admin/agentBanners') }}">Banner Image</a></li>
                  <li><a href="{{ url('admin/agent') }}">Agents/Resellers</a></li>
                  <li><a href="{{ url('admin/popularAgent') }}">Popular Agent</a></li>
               </ul>
            </li>
            <li class>
               <a href="#!" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-tag"></i>
                  </div>
                  <span>Deals</span>
               </a>
            </li>
            <li class>
               <a href="#!" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-users"></i>
                  </div>
                  <span>Community</span>
               </a>
            </li>
            <li class>
               <a href="{{url('admin/magazine')}}" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-book"></i>
                  </div>
                  <span>Magazine News</span>
               </a>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-key"></i>
                  </div>
                  <span>Knowledge Center</span>
               </a>
               <ul>
                  <li><a href="#!">Translation</a></li>
                  <li><a href="#!">Compare</a></li>
                  <li><a href="#!">Wheelz Advice</a></li>
                  <!-- <li><a href="Checkout.html">Checkout</a></li> -->
               </ul>
            </li>
            <li class>
               <a href="#!" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-car"></i>
                  </div>
                  <span>Market</span>
               </a>
            </li>
            <li class>
               <a href="#!" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-flag"></i>
                  </div>
                  <span>Reports</span>
               </a>
            </li>
            <li class>
               <a href="#!" aria-expanded="false">
                  <div class="icon_menu">
                     <i class="fa fa-cogs"></i>
                  </div>
                  <span>Settings</span>
               </a>
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
                        <!-- <div class="search_inner">
                           <form action="#">
                              <div class="search_field">
                                 <input type="text" placeholder="Search here...">
                              </div>
                              <button type="submit"> <img src="{{ url('public/img/icon/icon_search.svg') }}" alt> </button>
                           </form>
                        </div>
                        <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span> -->
                     </div>
                     <div class="header_right d-flex justify-content-between align-items-center">
                        <!-- <div class="header_notification_warp d-flex align-items-center">
                           <li>
                              <a class="bell_notification_clicker nav-link-notify" href="#"> <img src="{{ url('public/img/icon/bell.svg') }}" alt>
                              </a>
                              <div class="Menu_NOtification_Wrap">
                                 <div class="notification_Header">
                                    <h4>Notifications</h4>
                                 </div>
                                 <div class="Notification_body">
                                    <div class="single_notify d-flex align-items-center">
                                       <div class="notify_thumb">
                                          <a href="#"><img src="{{ url('public/img/staf/2.png') }}" alt></a>
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
                                          <a href="#"><img src="{{ url('public/img/staf/4.png') }}" alt></a>
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
                                          <a href="#"><img src="{{ url('public/img/staf/3.png') }}" alt></a>
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
                                          <a href="#"><img src="{{ url('public/img/staf/2.png') }}" alt></a>
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
                                          <a href="#"><img src="{{ url('public/img/staf/4.png') }}" alt></a>
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
                                          <a href="#"><img src="{{ url('public/img/staf/3.png') }}" alt></a>
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
                           </li>
                           <li>
                              <a class="CHATBOX_open nav-link-notify" href="#"> <img src="{{ url('public/img/icon/msg.svg') }}" alt> </a>
                           </li>
                        </div> -->
                        <div class="profile_info">
                           <?php if(isset($admin)){ ?>
                           <img src="{{ url('public/img') }}/{{ $admin->image }}" alt="Profile Image">
                           <?php } ?>
                           <div class="profile_info_iner">
                              <div class="profile_author_name">
                                 <p><?php if($admin->userType == 1){ echo "Admin"; }else if($admin->userType == 2){ echo "Staff"; } ?></p>
                                 <h5><?= $admin->name ?></h5>
                              </div>
                              <div class="profile_info_details">
                                 <a href="{{ url('/admin/profile') }}/{{ base64_encode($admin->id) }}">My Profile </a>
                                 <!-- <a href="#">Settings</a> -->
                                 <a href="{{ url('/admin/logout') }}">Log Outs </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>