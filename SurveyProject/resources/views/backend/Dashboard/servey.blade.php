<!DOCTYPE html>
<html lang="en">
<head>

    {{-- Location Map --}}






                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>IBSC_SURVEY</title>

                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>


                <!-- Google Font: Source Sans Pro -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
                <!-- Font Awesome -->
                <link rel="stylesheet" href="{{asset('Admin/plugins/fontawesome-free/css/all.min.css')}}">
                {{-- @include('backend.header-footer-files.css_files') --}}

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

                <!--  Modal show  -->

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

                <!-- Latest compiled JavaScript -->
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <style>
                    .container
                {
                width: 85%;
                margin: 50px auto;
                color: #555;
                font-family: Raleway;
                margin-top: 40px;
                }

                .modal {
                    --bs-modal-zindex: 1055;
                    --bs-modal-width: 60% !important;
                    --bs-modal-padding: 1rem;
                    --bs-modal-margin: 0.5rem;
                    --bs-modal-color: ;
                    --bs-modal-bg: #fff;
                    --bs-modal-border-color: var(--bs-border-color-translucent);
                    --bs-modal-border-width: 1px;
                    --bs-modal-border-radius: 0.5rem;
                    --bs-modal-box-shadow: 0 0.125rem 0.25remrgba(0, 0, 0, 0.075);
                    --bs-modal-inner-border-radius: calc(0.5rem - 1px);
                    --bs-modal-header-padding-x: 1rem;
                    --bs-modal-header-padding-y: 1rem;
                    --bs-modal-header-padding: 1rem 1rem;
                    --bs-modal-header-border-color: var(--bs-border-color);
                    --bs-modal-header-border-width: 1px;
                    --bs-modal-title-line-height: 1.5;
                    --bs-modal-footer-gap: 0.5rem;
                    --bs-modal-footer-bg: ;
                    --bs-modal-footer-border-color: var(--bs-border-color);
                    --bs-modal-footer-border-width: 1px;
                    position: fixed;
                    top: 0;
                    left: 0;
                    z-index: var(--bs-modal-zindex);
                    display: none;
                    width: 100%;
                    height: 100%;
                    overflow-x: hidden;
                    overflow-y: auto;
                    outline: 0;
                }
                /*
                #image_y
                {
                    background-image:url('images/istockphoto-1330728769-170667a.jpg');
                    opacity: 0.8;
                    height: 50%;
                    background-repeat: no-repeat;
                    width: 100%;


                } */
                body
                {
                    overflow-x: hidden;
                }

                </style>


</head>
<body class="hold-transition sidebar-mini layout-fixed" onLoad="initGeolocation();">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('images/e439272bf16c2df6b43e480de9fb1810_w200.webp')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('Survey.Index')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>


    @php
    $id=Session::get('user_id');
    $totalsurvey=App\Models\Survetotal::get();
    $totaluser=App\Models\User::get();
    $survey=count($totalsurvey);
    $usertotal=count( $totaluser);
    $id=Session::get('user_id');
    $user=App\Models\User::where('studentId',$id)->first();
    //$usertime=App\Models\Survetotal::where('user_id',$id)->orderBy('id', 'desc')->first();


        //$todate = Carbon\Carbon::parse( $usertime->created_at);
        $todate = Carbon\Carbon::now();
        $from = Carbon\Carbon::parse($user->created_at);

        $datetotal=$from->diffInDays($todate);
        # code...




   @endphp


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
        <a class="nav-link"  href="{{route('Profile')}}">
            Profile
        </a>
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


      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a  class="brand-link">
        <img src="{{ asset('images/download.png') }}" class="brand-image img-circle elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light">IBSC,RU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}

        @php
          $user_id=Session::get('user_id');
          $user=App\Models\User::where('studentId', $user_id)->first();
        @endphp
        <div class="info">
          <a class="d-block">{{$user->firstname}} {{$user->lastname}}</a>
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
                <a href="{{route('Survey.Index')}}" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    User Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

              </li>

              <li class="nav-item">
                <a href="{{url('myservey')}}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    MySurveys
                    <i class="fas fa-angle-left right"></i>

                  </p>
                </a>

              </li>

              <li class="nav-item">
                <a href="{{route('create.survey')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Create&nbsp;Survey
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

              </li>







        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">



            <div class="row justify-content-center">
               <div class="col-md-11">
                @yield('content')

               </div>






            </div>




    <!-- /.content-header -->



    <!-- Main content -->



    <!-- /.content -->

     </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy;<a href="https://adminlte.io">rajIt</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">

    </div>
  </footer> --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!--     >

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
@include('backend.header-footer-files.js_files')





        <script>
            $(document).ready(function () {
                $('#myTable').DataTable();
            });
        </script>


<script>
    $('#decline_confirm').on('submit',function(e){


         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({


            url : "{{ url('Teacher.create') }}",
            type : "post",
            data:$('#decline_confirm').serialize(),

            success:function(message)
            {
                Swal.fire(
                 'Teacher!',
                 'Successfully Saved!',
                  'success'
               );

                 location.reload();

            }

        })
    });
</script>

{{-- <script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" class="form-control" name="name[]" placeholder="Enter Teacher Name"></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script> --}}



<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>






@method('js')

</body>





</html>