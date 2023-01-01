<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>rajIT School</title>
  <link rel = "icon" href="{{asset('images/4WYgORYERneMHCAVLl4s.png')}}"
  type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/fontawesome-free/css/all.min.css')}}">
  {{-- @include('backend.header-footer-files.css_files')
  @include('backend.header-footer-files.js_files') --}}
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/summernote/summernote-bs4.min.css')}}">



  {{-- Sidebar droupdown menu --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

<!-- ======= Icons used for dropdown (you can use your own) ======== -->


 {{-- Sidebar droupdown menu --}}
  <style>

.modal-content {
    position: relative;
    display: -ms-flexbox;
    display: middle!important;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 650px!important;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 0.3rem;
    box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 50%);
    outline: 0;
}


  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">


            @if (session('remainder'))
            <div>
                <script>
                    alert('Remainder Send')
                </script>
            </div>
        @endif

<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('images/e439272bf16c2df6b43e480de9fb1810_w200.webp')}}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('AdminDas')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        {{-- <a class="nav-link"  href="{{route('Profile')}}">
            Profile
        </a> --}}
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link"  href="{{route('signOut')}}">
            Sign Out

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>

        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>gdfgd
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @php
       $company=App\Models\Company_settings::first();
    @endphp

    @if ($company)
        <a  class="brand-link">
            <img src="{{ URL::to($company->image) }}" class="brand-image img-circle elevation-3" style="opacity: 1">
        <span class="brand-text font-weight-light">{{ucwords($company->name)}}</span>
        </a>

     @else

     <a  class="brand-link">
        <img src="#" class="brand-image img-circle elevation-3" style="opacity: 1">
       <span class="brand-text font-weight-light"></span>
    </a>



    @endif
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}

        @php
          $user_id=Auth::user()->id;
          $user=App\Models\User::where('id', $user_id)->first();
        @endphp
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('AdminDas')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Admin Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          </li>




          {{-- SuperAdmin Part --}}
          @if (Auth::user()->hasRole('SuperAdmin'))

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item1" href="#">

                <i class="nav-icon fas fa-lock"></i>
                <p>
                    Setting's
                  <i class="fas fa-angle-left right"></i>
                </p>




            </a>
            <ul id="menu_item1" class="submenu collapse" data-bs-parent="#nav_accordion">
                <li>
                    <a href="{{route('allpermission')}}" class="nav-link {{ request()->is('all/Permission') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-circle"></i>
                           All Permission

                        </p>
                      </a>
                </li>
                <li>
                    {{-- email.setting --}}
                    <a class="nav-link" href="{{route('mail.configuration')}}">
                        <i class="nav-icon fas fa-circle"></i>

                        Email Setting's

                     </a>

                </li>

                <li>
                    <a href="{{route('Message.body')}}" class="nav-link {{ request()->is('Message/Body') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Message&nbsp;Body
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                </li>


                <li>
                    <a href="{{route('Company.setting')}}" class="nav-link {{ request()->is('Company/Settings') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Company&nbsp;Details
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                </li>









            </ul>

        </li>


          {{-- <li class="nav-item">


          </li> --}}


          <li class="nav-item">
            <a href="{{route('approve.discount')}}" class="nav-link {{ request()->is('approve/discount') ? 'active' : '' }}">
              <i class="nav-icon fas fa-check-square"></i>
              <p>
                 Approve Discount
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

          </li>





          <li class="nav-item">
            <a href="{{route('allstudent')}}" class="nav-link {{ request()->is('Student/all') ? 'active' : '' }}">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                All&nbsp;Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

          </li>



          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item2" href="#">

                <i class="nav-icon fas fa-book"></i>
                <p>
                    Course Management
                  <i class="fas fa-angle-left right"></i>
                </p>




            </a>
            <ul id="menu_item2" class="submenu collapse" data-bs-parent="#nav_accordion">
                <li>
                    <a href="{{route('addCourse')}}" class="nav-link {{ request()->is('Add/Course') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                           Course
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                </li>

                <li>
                    <a href="{{route('Coursecategory.add')}}" class="nav-link {{ request()->is('Course/Category') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                           Course&nbsp;Category
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                </li>


                <li>
                    <a href="{{route('Course.discount')}}" class="nav-link {{ request()->is('Course/discount') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-percent"></i>
                        <p>
                           Course&nbsp;Discount
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                </li>


                <li>
                    <a href="{{route('Coursecontent.add')}}" class="nav-link {{ request()->is('Course/Content') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                           Course&nbsp;Content
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                </li>


                <li>
                  <a href="{{route('Upcoming.course')}}" class="nav-link {{ request()->is('Upcoming/Course') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-school"></i>
                      <p>
                         Upcoming&nbsp;Course
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>

              </li>

              <li>
                <a href="{{route('Seminar')}}" class="nav-link {{ request()->is('Seminar/Content') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                       Course&nbsp;Seminar
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

            </li>

                      <li>
                <a href="{{route('allSeminar')}}" class="nav-link {{ request()->is('Seminar/Content') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                       Seminar
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

            </li>

            </ul>

        </li>



          {{-- Company Setting --}}
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item3" href="#">

                <i class="nav-icon fas fa-book"></i>
                <p>
                    Company Setting's
                  <i class="fas fa-angle-left right"></i>
                </p>




            </a>
            <ul id="menu_item3" class="submenu collapse" data-bs-parent="#nav_accordion">
                <li>
                  <a href="{{route('Slider.image')}}" class="nav-link {{ request()->is('Slider/Image') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                           Slider&nbsp;Image
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                </li>

                <li>
                  <a href="{{route('Client')}}" class="nav-link {{ request()->is('Client/Image') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                         Client&nbsp;logo
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>

              </li>


              <li>
                <a href="{{route('FooterLink')}}" class="nav-link {{ request()->is('Footer/All') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                       Footer&nbsp;Link
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

            </li>


            <li>
                <a href="{{route('SuccessStory')}}" class="nav-link {{ request()->is('Success/Story') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                      Success&nbsp;Story
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

            </li>


            <li>
                <a href="{{route('User')}}" class="nav-link {{ request()->is('User/Add') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                       User
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

            </li>


            </ul>

        </li>



          {{-- Company Setting End --}}






          <li class="nav-item">
            <a href="{{route('addbatch')}}" class="nav-link {{ request()->is('Add/Batch') ? 'active' : '' }}">
                <i class="nav-icon fas fa-university"></i>
                <p>
                   Batch
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>


          </li>


          <li class="nav-item">
            <a href="{{route('AddSchedul')}}" class="nav-link {{ request()->is('Schedul/Add') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar"></i>
              <p>
                Schedul
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

          </li>




          <li class="nav-item">
            <a href="{{route('Expenditure')}}" class="nav-link {{ request()->is('Expenditure/List') ? 'active' : '' }}">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                    Expenditure
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li>


          <li class="nav-item">
            <a href="{{route('exam.management')}}" class="nav-link {{ request()->is('exam/management') ? 'active' : '' }}">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                    ExamManagement
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li>


           {{-- <li class="nav-item">
            <a href="{{route('payment.details')}}" class="nav-link {{ request()->is('Payment/Details') ? 'active' : '' }}">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                    Payment&nbsp;Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li> --}}





          <li class="nav-item">
            <a href="{{route('Promo.details')}}" class="nav-link {{ request()->is('Promo/Details') ? 'active' : '' }}">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                    Promo&nbsp;Code
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li>





          <li class="nav-item">
            <a href="{{route('trainer.add')}}" class="nav-link ">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                   Trainer&nbsp;Add
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li>



          @endif

          {{-- Superadmin part end --}}



          {{-- Role Setting --}}
          @if (Auth::user()->hasRole('Admin'))


          <li class="nav-item">
            <a href="{{route('allstudent')}}" class="nav-link {{ request()->is('Student/all') ? 'active' : '' }}">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                All&nbsp;Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

          </li>



          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item2" href="#">

                <i class="nav-icon fas fa-book"></i>
                <p>
                    Course Management
                  <i class="fas fa-angle-left right"></i>
                </p>




            </a>
            <ul id="menu_item2" class="submenu collapse" data-bs-parent="#nav_accordion">
                <li>
                    <a href="{{route('addCourse')}}" class="nav-link {{ request()->is('Add/Course') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                           Course
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                </li>

                <li>
                    <a href="{{route('Coursecategory.add')}}" class="nav-link {{ request()->is('Course/Category') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                           Course&nbsp;Category
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                </li>


                <li>
                    <a href="{{route('Course.discount')}}" class="nav-link {{ request()->is('Course/discount') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-percent"></i>
                        <p>
                           Course&nbsp;Discount
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                </li>


                <li>
                    <a href="{{route('Coursecontent.add')}}" class="nav-link {{ request()->is('Course/Content') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                           Course&nbsp;Content
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                </li>


                <li>
                  <a href="{{route('Upcoming.course')}}" class="nav-link {{ request()->is('Upcoming/Course') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-school"></i>
                      <p>
                         Upcoming&nbsp;Course
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>

              </li>

              <li>
                <a href="{{route('Seminar')}}" class="nav-link {{ request()->is('Seminar/Content') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                       Course&nbsp;Seminar
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

             </li>

             <li>
                <a href="{{route('allSeminar')}}" class="nav-link {{ request()->is('Seminar/Content') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                       Seminar
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

            </li>


            </ul>

        </li>





          <li class="nav-item">
            <a href="{{route('addbatch')}}" class="nav-link {{ request()->is('Add/Batch') ? 'active' : '' }}">
                <i class="nav-icon fas fa-university"></i>
                <p>
                   Batch
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>


          </li>


          <li class="nav-item">
            <a href="{{route('AddSchedul')}}" class="nav-link {{ request()->is('Schedul/Add') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar"></i>
              <p>
                Schedul
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

          </li>



          {{-- <li class="nav-item">
            <a href="{{route('AssignStudent')}}" class="nav-link {{ request()->is('Schedul/Add') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar"></i>
              <p>
                Assign&nbsp;Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

          </li> --}}













          <li class="nav-item">
            <a href="{{route('Expenditure')}}" class="nav-link {{ request()->is('Expenditure/List') ? 'active' : '' }}">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                    Expenditure
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li>


          <li class="nav-item">
            <a href="{{route('exam.management')}}" class="nav-link {{ request()->is('exam/management') ? 'active' : '' }}">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                    ExamManagement
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li>


           {{-- <li class="nav-item">
            <a href="{{route('payment.details')}}" class="nav-link {{ request()->is('Payment/Details') ? 'active' : '' }}">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                    Payment&nbsp;Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li> --}}





          <li class="nav-item">
            <a href="{{route('Promo.details')}}" class="nav-link {{ request()->is('Promo/Details') ? 'active' : '' }}">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                    Promo&nbsp;Code
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li>





          <li class="nav-item">
            <a href="{{route('trainer.add')}}" class="nav-link ">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                   Trainer&nbsp;Add
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          </li>




          @endif








        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                @php
                    $newRegister=App\Models\User::where('status',0)->get();
                    $newUser=count($newRegister);
                @endphp
                <h3>{{$newUser}}</h3>

                <p>New Registration</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @php
                    $user=App\Models\User::where('status',1)->get();
                    $total=count($user);
                @endphp
                <h3>{{$total}}</h3>

                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-man"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 ">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                @php
                    $trainer=App\Models\User::where('status',3)->get();
                    $total=count($trainer);
                @endphp

                <h3>{{$total}}</h3>

                <p>Total Trainer</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->


          <!-- ./col -->
          <div class="col-lg-3 ">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                @php
                    $courseall=App\Models\Course::where('active',1)->get();
                    $total_c=count($courseall);
                @endphp

                <h3>{{$total_c}}</h3>

                <p>Total Course</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card shadow">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                   User
                </h3>

              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <canvas id="myChart" style="background-color: rgb(237, 252, 252);">


                 </canvas>





                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->



          </section>



          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @if ($company)
  <footer class="main-footer">
    <strong>Copyright &copy;<a href="#">{{$company->name}}</a>.</strong>
    All rights reserved.

  </footer>


  @else
  <footer class="main-footer">
    <strong>Copyright &copy;<a href="#"></a>.</strong>
    All rights reserved.

  </footer>

  @endif

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('Admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('Admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('Admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('Admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
{{-- <script src="{{asset('Admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
{{-- <script src="{{asset('Admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{asset('Admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('Admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('Admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('Admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('Admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Admin/plugins/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('Admin/plugins/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('Admin/plugins/dist/js/pages/dashboard.js')}}"></script>


<script>



    var data = @json($year);
    var datanumber = @json($number);



 const ctx = document.getElementById('myChart').getContext('2d');
 const myChart = new Chart(ctx, {
     type: 'bar',
     data: {
         labels: data,
         datasets: [{
             label: 'User',
             barThickness: 60,
             maxBarThickness: 100,

             data:datanumber,
             backgroundColor: [
                 'rgb(168, 120, 231)',
                 'rgba(144,238,144)',
                 'rgba(70,130,180)',
                 'rgba(128,0,0)',
                 'rgba(153, 102, 255, 0.2)',
                 'rgba(255, 159, 64, 0.2)'
             ],
             borderColor: [
                 'rgba(255, 99, 132, 1)',
                 'rgba(54, 162, 235, 1)',
                 'rgba(255, 206, 86, 1)',
                 'rgba(75, 192, 192, 1)',
                 'rgba(153, 102, 255, 1)',
                 'rgba(255, 159, 64, 1)'
             ],
             borderWidth:0
         }]
     },
     options: {
         scales: {
             y: {
                 beginAtZero: true
             }
         }
     }
 });
 </script>


@include('sweetalert::alert')
</body>


</html>
