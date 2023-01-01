<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
<meta name="viewport" content="width=device-width, minimum-scale=1.0">

@php
   $company_name=App\Models\Company_settings::first();
@endphp

<title>{{$company_name->name}}</title>
<link rel="icon" href="{{asset($company_name->image)}}"
type = "image/x-icon">
 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"> --}}

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
{{-- fontawesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />



{{-- owl --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
{{-- boot4 --}}
{{-- swwert alert --}}

 {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script> --}}


@include('backend.header-footer-files.js_files')
   <style>
 #carousel-image {
    width: 100%;
  height: 65vh;
  min-height: 600px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}



#mainNavbar{
	padding-left:  50px;
	padding-top: 20px;
    background-color: rgba(0, 8, 8, 0.6);
}

/* .navbar-dark .navbar-brand{
font-family: 'Source Serif Pro', serif;

} */

.navbar-nav .nav-link{
	font-family: 'Source Serif Pro', serif;


}

.display-4{
	font-family: 'Source Serif Pro', serif;
}

.lead{
	font-family: 'Source Serif Pro', serif;
}

.navbar.scrolled {
    background: rgb(34, 31, 31);
    transition: background 500ms;
}

.font-weight-light{
	font-family: 'Source Serif Pro', serif;
}

/* #navbar-brand
{
   width:180px;
} */

/* .navbar-collapse > a {
  padding-left:30px;
  padding-right:30px;
} */


/* body
{
  overflow-x: hidden;
  background-image: url('images/offCanvasBg.png');
} */

html, body {
  overflow-x:hidden;
  background-image: url('images/offCanvasBg.png');
}

a {
  text-decoration: none;
}

#btn {
    background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
  cursor: pointer;
  padding: 16px 20px;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  border-radius: 40px;
  color: #f5f8fb;
  border: 1px solid #dee5f1;
  position: relative;
  -webkit-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -moz-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -ms-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -o-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}

#btn2 {

    background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
  cursor: pointer;
  padding: 16px 20px;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  border-radius: 40px;
  color: #f5f8fb;
  border: 1px solid #dee5f1;
  position: relative;
  -webkit-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -moz-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -ms-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -o-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}



#btn3 {
    background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
  cursor: pointer;
  padding: 8px 20px;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  border-radius: 40px;
  color: #f5f8fb;
  border: 1px solid #dee5f1;
  position: relative;
  -webkit-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -moz-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -ms-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -o-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}

#btn i {
  position: absolute;
  font-size: 12px;
  line-height: 0;
  top: 50%;
  margin-top: 1px;
  right: 15%;

}

#btn2 i {
  position: absolute;
  font-size: 12px;
  line-height: 0;
  top: 50%;
  margin-top: 1px;
  right: 15%;

}

#btn3 i {
  position: absolute;
  font-size: 12px;
  line-height: 0;
  top: 50%;
  margin-top: 1px;
  right: 15%;

}

#btn:hover {
  background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
}

/* #btn:hover i {
  display: block;
} */

#btn2:hover {
  background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
}

/* #btn2:hover i {
  display: block;
} */


#btn3:hover {
  background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
}

/* #btn3:hover i {
  display: block;
} */

.courseitem
{
    position: absolute;
    /* background: #a98b53; */
    padding: 6px 16px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    right: 0px;
    top: 0;
    color: #fff;
    font-weight: 600;
    letter-spacing: .2px;
    padding-bottom: 9px;

}
#upcomingimage
{
   opacity: 2.2;
}

#seminar
{
   background-image: url('images/photo-1510070009289-b5bc34383727.avif');
   background-size: cover;


}
#seminar .overlaw
{

   background-color: rgba(0, 8, 8, 0.7);
   height: 100%;
   weight:100%;

}

.counter-count
{
    font-size: 25px;
    /* background-color: #00b3e7; */
    /* border-radius: 50%; */
    position: relative;
    color: #ffffff;
    text-align: center;
    line-height: 32px;
    width: 92px;
    height: 92px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    display: inline-block;
}

#overlaw2
{
   background-color: rgba(71, 46, 12, 0.6);
   height: 100%;
   weight:100%;
}

#seminarCard
{
   background-image: url('images/diggity-marketing-SB0WARG16HI-unsplash_cleanup.jpg');
   /* background-color:rgba(0,0,0, 0.2); */


}
#cardbody
{

   background-color:rgba(87, 48, 48, 0.8);

}

}
.img-responsive {
    width: 100%;
    height: 50%;

}


#indicators
{


    height: 500px;

}

#upcoming
{
    background-color:rgba(87, 48, 48, 0.8);
}


@media only screen and (max-width: 599px) {
  #img {
         width: 30%;
  }
}
.Avatar {
  vertical-align: middle;
  width: 50px;
  height: 90px;
  border-radius: 50%;
}

.owl-nav button {
    position: absolute;
    top: 0;
    bottom: 0;
}

.owl-prev {
    right: -25px;
}

.owl-next {
    left: -25px;
}

.owl-nav button i {
    font-size: 25px;
    text-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}


element.style {
}
.owl-theme .owl-nav [class*=owl-]:hover {
    background: #4DC7A0;
    color: #FFF;
    text-decoration: none;
}
.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot
{
    background: none !important;
}





.owl-theme .owl-nav [class*=owl-]:hover {
    background: none !important;
    color: #FFF;
    text-decoration: none;
}
.owl-nav button {
    position: absolute;
    top: 0;
    bottom: 0;
    border: none !important;
    outline: none !important;
}
   </style>
</head>


<body>



      <nav id ="mainNavbar" class ="navbar navbar-dark  navbar-expand-md py-0 fixed-top">

         @php
             $company=App\Models\Company_settings::first();
         @endphp




               @if ($company)

               <div class="col-md-1 col-sm-1 pt-2 mb-2" id="img">
               <a href="#" >
                     <img src="{{URL::to($company->image)}}" style="max-width:100%;height:auto;">

               </a>

               </div>


               @else

               <div class="col-md-3 pt-2 mb-2" id="img">
               <a href="#" >
                     <img src="#" style="width: 100%;height:auto;">

               </a>

               </div>

               @endif




         <button class = "navbar-toggler" data-toggle="collapse" data-target ="#navLinks">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class ="collapse navbar-collapse" id="navLinks">
                  <ul class ="navbar-nav">
                     <li class ="nav-item">
                     <a href="{{route('rajitschool')}}" class="nav-link" style="color: #dee5f1;">HOME</a>
                     </li>
                     <li class ="nav-item">
                     <a href="#" class="nav-link" style="color: #dee5f1;">ABOUT</a>
                     </li>
                     <li class ="nav-item">
                     <a href="#" class="nav-link" style="color: #dee5f1;">SERVICES</a>
                     </li>
                     <li class ="nav-item">
                        <a href="{{route('communication')}}" class="nav-link" style="color: #dee5f1;">CONTACTS</a>
                     </li>

                     {{-- <li class ="nav-item" style="margin-left: 120PX;">
                        <a  href="#" class="nav-link">LOGIN</a>
                     </li> --}}
                  </ul>

                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a href="{{route('user.login')}}" class="nav-link" style="color: #dee5f1;">LOGIN</a>
                     </li>

                   </ul>


             </div>




         </nav>













         <header>
         @php
            $allslider=App\Models\Slider::get();
         @endphp


         <div id="indicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#indicators" data-slide-to="0" class="active"></li>

            </ol>
            <div class="carousel-inner" role="listbox">
              @foreach ($allslider as $key => $slider)

            <!-- Slide One - Set the background image for this slide in the line below -->
                <div  class="carousel-item {{$key == 0 ? 'active' : '' }}">

                  <img id="carousel-image" src="{{URL::to($slider->image)}}" alt="Responsive image">


               <div class="carousel-caption d-none d-md-block">


                  <a href="{{route('find.course')}}">
                     <button role="button" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i> <span class="spn" style="color: rgb(253, 250, 242);">Find Course</span>
                     </button>

                  </a>

               </div>
            </div>
            @endforeach
            <!-- Slide Two - Set the background image for this slide in the line below -->

            <!-- Slide Three - Set the background image for this slide in the line below -->

            </div>
            <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
            <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only" >Next</span>
               </a>
         </div>



         </header>

                     <!-- Page Content -->
                     {{-- @php
                        $course=App\Models\Course::where('learning_site',2)->limit(3)->get();
                     @endphp --}}

                     @php
                     $course=App\Models\Course::where('learning_site',2)
                     ->orWhere('learning_site',1)
                     ->limit(3)->get();
                  @endphp




<section>
   <div class="container" style="margin-top: 150px;">

      <h4 class="text-center">Course Running</h4>


            <div class="row pt-4">


         @foreach ($course as $allcourse)
                  @php

                      $allseat=App\Models\Batch::
                      where('course_id',$allcourse->id)
                      ->where('active',1)
                      ->sum('seat');

                 @endphp

               <div class="col-md-4 p-2">
                  <div class="card shadow h-100 bg-blue-lightest">

                     <div class="header">

                      @if ($allcourse->learning_site==2)
                          <div class="courseitem" style="background-color: #a98b53;">

                                Offline


                          </div>

                          @else

                          <div class="courseitem" style="background-color: #1d891d;">

                                Online



                          </div>

                      @endif


                        <img src="{{URL::to($allcourse->image)}}" style="width: 100%;height:auto;">

                     </div>







                           <div class="pt-4" style="padding-left: 10px;">
                              <span style="font-weight: bold;">CourseName&nbsp;</span>
                              <span></span>
                              <span>&nbsp;{{ucwords($allcourse->name)}}</span>

                           </div>




                           @php
                              $time=\Carbon\Carbon::now()->format('m-d-y');
                              $discount=App\Models\Payment::where('course_id',$allcourse->id)->first();
                        @endphp




                                 @if ($discount)

                                 @if($discount->s_date!=null)

                                    @if ($discount->s_date>=$time && $time<=$discount->e_date)

                                          <div class="pt-1" style="padding-left: 10px;">

                                                <span style="font-weight: bold;">Course Fees</span>
                                                <span>&nbsp;&nbsp;</span>
                                                <span>{{$allcourse->fees-$discount->fullpayment}}</span>

                                                <span class="currency" style="font-family: serif;">&#2547;</span>&nbsp;&nbsp;
                                                <span> <del>{{$allcourse->fees}}</del></span>
                                                <span class="currency" style="font-family: serif;">&#2547;</span>
                                          </div>

                                          {{-- <div class="fs-card-origin-price mt-2">






                                          </div> --}}


                                       @else

                                          <div class="p-1" style="padding-left: 10px;">
                                             <span style="font-weight: bold;">Course Fees</span>
                                             <span>&nbsp;&nbsp;</span>

                                                <span>{{$allcourse->fees}}</span>
                                                <span class="currency" style="font-family: serif;">&#2547;</span>

                                          </div>

                                 @endif


                                 @else


                                    <div class="p-1" style="padding-left: 10px;">

                                       <span style="font-weight: bold;">Course Fees</span>
                                       <span>&nbsp;&nbsp;</span>
                                       <span>{{$allcourse->fees}}</span>

                                       <span class="currency" style="font-family: serif;">&#2547;</span>

                                    </div>







                                 @endif


                                 @else

                                 <div class="p-1" style="padding-left: 10px;">
                                    <span style="font-weight: bold;">Course Fees</span>
                                    <span>&nbsp;&nbsp;</span>
                                    <span>{{$allcourse->fees}}</span>

                                 <span class="currency" style="font-family: serif;">&#2547;</span>


                                 </div>


                                 @endif



                           <div  class=" p-2 mt-2 mb-3">
                              <a href="{{route('course.details',$allcourse->id)}}">
                                 <button role="button" class="btn btn-sm btn-success">
                                     <span class="spn" style="color: rgb(244, 239, 228);">Enroll Course</span>
                                 </button>

                              </a>

                           </div>



                        </div>

                     </div>

                     @endforeach


                  </div>

               </div>





         </div>





   </div>




            <div class="row justify-content-center mt-5 p-0 m-0" style="vertical-align: middle;">

                <a class="btn" href="{{route('find.course')}}" id="btn">All Course&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-alt-circle-right"></i></a>

            </div>
</section>


               {{-- Upcoming Course --}}
               <section class="mt-5"  style="background-image: url('images/MbMnRkd0h4gg8hcS8Azr.jpg');background-position: center;">
                  <div class="container pt-2 pb-4" id="upcomingimage" >


                        <div class="row justify-content-center pt-4">
                           <h4 class="text-center" style="color:aliceblue;font-weight:bold;">Upcoming Course</h4>

                        </div>

                           <div class="row justify-content-center pt-2">
                              <p class="text-center" style="color:aliceblue;">Course Will Start Soon</p>

                           </div>


                           @php
                                 $upcoming=App\Models\Upcomingcourse::where('status','upcoming')->limit(3)->get()
                           @endphp
                           <div class="row justify-content-center pt-2 pb-4">

                              @foreach ($upcoming as $upcomings)
                                 <div class="col-md-4 p-2">
                                          <div class="card shadow h-100 bg-blue-lightest">
                                             <div class="header">


                                                <img src="{{URL::to($upcomings->image)}}" style="width:100%;height:auto;">

                                             </div>


                                             <div class="card-body  mt-4" id="upcoming">

                                                <h5 class="text-center pt-4 mb-2" style="font-weight: bold;color:#fff;">{{ucwords($upcomings->name)}}</h5>

                                             </div>

                                          </div>

                                 </div>

                              @endforeach



                           </div>




                           {{-- <div class="row justify-content-center mt-2 p-4">
                              <a class="btn" href="#" id="btn2" >UpcomingCourse&nbsp; <i class="fas fa-arrow-alt-circle-right"></i></a>

                           </div> --}}
                     </div>

                  </div>



               </section>


               {{-- Our Client --}}

               @php
                  $allclient=App\Models\Client::get();
               @endphp

               <section class="mt-5">

                  <div class="container">
                     <div class="row justify-content-center mt-5 p-0 m-0">
                        <h4>Our Clients</h4>

                     </div>

                     <div class="row justify-content-center p-4">

                        @foreach ($allclient as $client)
                        <div class="col col-xl-1 col-md-3 col-sm-3 p-2">

                           <p class="text-center">
                              <img  src="{{URL::to($client->image)}}" width="60" height="60" alt="" style="border-radius: 50%;">

                           </p>




                        </div>

                        @endforeach



                        </div>





                     </div>

                  </div>




               </section>

               {{-- our clients end --}}


                  {{-- seminar start --}}

                  @php
                     $totaluser=App\Models\User::where('status',1)->get();
                     $user=count($totaluser);

                     $totalcourse=App\Models\Course::where('active',1)->get();
                     $TotalCourse=count($totalcourse);

                     $totalTrainer=App\Models\User::where('status',3)->get();
                     $Trainer=count($totalTrainer);
                  @endphp

                  <section id="seminar" class="counter mt-5">
                     <div class="overlaw py-5">

                     <div class="container">


                           <div class="row justify-content-center  pt-5 mt-4">

                              <div class="col-md-4 text-center">


                                 <table class="table-borderless">


                                    <tr>

                                       <th>
                                          <span><i class="fas fa-book-open" style="color: #FFFFFF;width:333px;font-size:50px;"></i></span>

                                       </th>


                                    </tr>

                                    <tr>
                                       <th class="p-2">
                                          <h4  style="color:#FFFFFF;">Course's</h4>

                                       </th>

                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="counter-count" style="color:#c4c7ca;" >{{ $TotalCourse}}</h4>

                                       </th>
                                    </tr>

                                 </table>




                              </div>

                              <div class="col-md-4 text-center">

                                 <table class="table-borderless">


                                    <tr>

                                       <th>
                                          <span><i class="fas fa-graduation-cap" style="color: #FFFFFF;width:333px;font-size:50px;"></i></span>

                                       </th>


                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="p-2" style="color:#FFFFFF;">Student's</h4>

                                       </th>

                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="counter-count" style="color:#c4c7ca;" >{{ $user}}</h4>

                                       </th>
                                    </tr>

                                 </table>
                              </div>

                              <div class="col-md-4 text-center">

                                 <table class="table-borderless">


                                    <tr>

                                       <th>
                                          <span><i class="fas fa-book-open" style="color: #FFFFFF;width:333px;font-size:50px;"></i></span>

                                       </th>


                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="p-2"  style="color:#FFFFFF;">Trainer</h4>

                                       </th>

                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="counter-count" style="color:#c4c7ca;" >{{$Trainer}}</h4>

                                       </th>
                                    </tr>

                                 </table>

                              </div>


                           </div>

                        </div>



                     </div>

                        {{-- Seminar Webnier --}}

                        @php
                           $seminar=App\Models\Upcomingcourse::where('status','seminar')->limit(3)->get()
                        @endphp

                        <div class="overlaw2" id="overlaw2">
                            <div class="container" >

                                <div class="row justify-content-center pt-4">
                                   <h4 class="text-center" style="color:aliceblue;font-weight:bold;">Seminers and Webiners</h4>

                                </div>


                                <div class="row justify-content-center pt-4">



                                   @foreach ($seminar as $upcomings)
                                   <div class="col-md-4">
                                            <div class="card shadow h-100 bg-blue-lightest" id="seminarCard">

                                               @php
                                                  $string = preg_replace('/\s+/', '', $upcomings->name);
                                                   $course=str_split($string);
                                               @endphp


                                                <div  class="row justify-content-center pt-3 pb-3 m-4   h-100">
                                                  @foreach($course as $val)




                                                     <div class="card shadow" style="background-color:#c4c7ca;width:20px; height:20px;">

                                                           <p class="text-center" style="color:#232425;font-size:12px;">{{ucwords($val)}}</p>

                                                     </div>







                                               @endforeach



                                                </div>


                                               <div class="card-body" id="cardbody">

                                                  <h5 class="text-center mt-4" style="font-weight: bold;color:#fff;">{{ucwords($upcomings->name)}}</h5>

                                                  <div  class="text-center pt-4 pb-4">

                                                     <a  data-id="{{$upcomings->id}}" class="seminarDetails" id="btn3">Details&nbsp;&nbsp;<i class="fas fa-arrow-right" style="font-size:10px; "></i></a>


                                                  </div>


                                                  <div  class="showDate{{$upcomings->id}} text-center mt-4" style="display: none;">

                                                     <div class=" mt-2">
                                                         <span style="font-weight: bold;color:#fff;">Seminar Date</span>

                                                         <span style="font-weight: bold;color:#fff;">&nbsp;&nbsp;:</span>

                                                        <span class="currency" style="font-family: serif;color:#fff;"> {{ \Carbon\Carbon::parse($upcomings->date)->format('M d Y'); }}</span>



                                                      </div>



                                                      <div class="mt-2">


                                                            <span style="font-weight: bold;color:#fff;">Seminar Time</span>

                                                            <span style="font-weight: bold;color:#fff;">&nbsp;&nbsp;:</span>

                                                            <span class="currency" style="font-family: serif;color:#fff;"> {{ $upcomings->time }}</span>

                                                      </div>


                                                      <div class="mt-2">


                                                         <span style="font-weight: bold;color:#fff;">
                                                            <button  class="btn btn-sm btn-danger cancel" data-id="{{$upcomings->id}}">Cancel</button>

                                                         </span>

                                                         <span>&nbsp;&nbsp;</span>

                                                         <span style="font-weight: bold;color:#fff;">


                                                             <button class="btn btn-sm btn-primary joing" data-id="{{$upcomings->id}}">Join&nbsp;Seminar</button>

                                                          </span>

                                                   </div>

                                                  </div>



                                               </div>

                                            </div>

                                   </div>

                                @endforeach




                                </div>

                                <div class="row justify-content-center pt-5 pb-5">
                                    <a class="btn" href="{{route('find.seminar')}}" id="btn2" >All&nbsp;Seminar &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-alt-circle-right"></i></a>

                               </div>
                             </div>

                        </div>


                        {{-- Seminar Webnier --}}
                  </section>

  {{-- seminar start --}}


    {{-- Success Story Section 214.38deg,#69acf8 -2.24%,#b97e7e 59.38% --}}


    <section class="mt-5" style="background: linear-gradient(#C52127, rgb(245, 138, 33));">

        <div class="container pt-2 pb-5">

          <h4 class="text-center pt-2 " style="font-weight: bold;color:#f5f8fb;">Our Success Story</h4>



           @php
               $allstory=App\Models\Story::get();
           @endphp
            <div class="owl-carousel owl-theme mt-4">
             @foreach ($allstory as $key => $story)

           <!-- Slide One - Set the background image for this slide in the line below -->


                     <div class="row justify-content-center">
                       <div class="col-md-12">

                           <div class="card shadow pt-4 h-32" style="border-radius:17px;">

                                 <div class="row p-4">
                                  <div class="col-md-3 pt-2  row justify-content-center" id="Avatar">
                                      <img src="{{URL::to($story->image)}}" class="Avatar">

                                   </div>

                                  <div class="col-md-9">
                                       <p  style="font-family: sans-serif;">


                                          @php
                                              $length=Str::length($story->description);
                                          @endphp

                                            {{-- @if($length<=150) --}}


                                            <span style="font-weight:bold;font-size:22px;">"</span>
                                            {{ Str::limit($story->description, 80, '...') }}
                                            <a href="javascript:void(0);" data-id="{{$story->id}}" class="seemore" align="right">see&nbsp;more</a>


                                                  <span style="font-weight:bold;font-size:22px;">"</span>


                                         <h5 class="p-4" align="right" style="font-weight: bold;">{{ucwords($story->name)}}</h5>
                                      </p>

                                  </div>

                                 </div>


                           </div>

                      </div>


                     </div>






             @endforeach
             <div class="owl-controls">
                <div class="owl-nav">
                    {{-- <div class="owl-prev">prev</div>
                    <div class="owl-next">next</div> --}}
                </div>

            </div>

        </div>



       </div>




   </section>


{{-- Success Story End --}}


  @php
      $company=App\Models\Company_settings::first();
  @endphp

    {{-- footer  --}}

    @include('backend.footer')




     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seminar Entry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form id="decline_confirm" >
            <div id="seminardata" class="p-4">





            ...
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              {{-- <button type = "submit" style = "border:2px solid #1dbf73;color:#1dbf73;"  class = "btn f-100">CONFIRM</button> --}}
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>

        </div>
      </div>
    </div>


  {{-- Seminar Modals --}}


    {{-- SuccesStory --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog" role="document" id="modeldialouge2">
        <div class="modal-content" >
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


            <div id="showstory" class="p-4" >





            ...
          </div>




        </div>
      </div>
    </div>


    {{-- Sucess story --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script>
      $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav: true,
    navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
    responsive:{
      0:{
        items:1
      },
      600:{
        items:2
      },
      1000:{
        items:2
      }
    }
  })
  </script>

  <script>
          $(function () {
              $(document).scroll(function () {
                  var $nav = $("#mainNavbar");
                  $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
              });
          });
      </script>


{{-- <script>
   $('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script> --}}



<script>
   $(document).ready(function ()
   {

       $(document).on('click','.seminarDetails',function()
           {


               var tr = $(this).attr('data-id');

               // $("#mydiv").css({display:""});
               $('.showDate'+tr).css({display:"block"});

           });


   });
</script>



<script>
   $(document).ready(function ()
   {

       $(document).on('click','.cancel',function()
           {


               var tr = $(this).attr('data-id');



               // $('.showDate'+tr).setAttribute("hidden");

               $('.showDate'+tr).css({display:"none"});



           });


   });
</script>


<script>
   function myFunction() {

       // var tr = $(this).attr('data-id');
       // alert(tr);
     var x = document.getElementById("showDate");
     if (x.style.display === "block") {
       x.style.display = "none";
     } else {
       x.style.display = "block";
     }
   }
   </script>


<script>
   // changePaymenttype('installment')

   function  changePaymenttype(type)
   {

       $(".paymenttype").hide();
       $("#"+type).show();



   }


</script>


<script>
   // changePaymenttype('installment')

   function  changePaymenttype(type)
   {

       $(".paymenttype").hide();
       $("#"+type).show();



   }


</script>

<script>
   $(document).ready(function ()
   {

       $(document).on('click','.joing',function()
           {


               var id = $(this).attr('data-id');

               // $('.showDate'+tr).css({display:"none"});
               event.preventDefault();
               jQuery.noConflict();

               $.ajax({

                type:"get",
                 url:"/SeminarAdd/"+id,

                     success: function(response)
                      {

                       $('#exampleModal').modal('show');
                       $('#seminardata').html(response.html);


                      }
              });




           });


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
           url : "{{ route('SeminarEntry') }}",
           type : "post",
           data:$('#decline_confirm').serialize(),

           success:function(results)
           {


              $('#exampleModal').modal('hide');
              location.reload();



           }

       })
   });
</script>


<script>

    // Counter To Count Number Visit
var a = 0;
$(window).scroll(function() {

  var oTop = $('.counter').offset().top - window.innerHeight;
  // Md.Asaduzzaman Muhid
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-count').each(function() {
        var $this = $(this);
        jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 2000,
            easing: 'swing',
            step: function () {
                $this.text(Math.ceil(this.Counter));
            }
        });
    });
    a = 1;// Md.Asaduzzaman Muhid
  }
});
</script>


<script>
    $(document).ready(function (e)
    {

        $(document).on('click','.seemore',function()
            {




                var id = $(this).attr('data-id');

                    // $('.showDate'+tr).css({display:"none"});
                    event.preventDefault();
                    jQuery.noConflict();

                    $.ajax({

                    type:"get",
                    url:"/ShowSuccess/"+id,

                        success: function(response)
                        {


                            $('#exampleModal2').modal('show');
                             $('#showstory').html(response.html);


                        }
                    });

                // $('#storyDetails'+tr).css({display:"block"});
                // $('#hideDetails'+tr).css({display:"none"});


            });


    });
 </script>

<script>
   $(document).ready(function (e)
   {

       $(document).on('click','.hide',function()
           {


               var tr = $(this).attr('data-id');
               $('#hideDetails'+tr).css({display:"block"});
               $('#storyDetails'+tr).css({display:"none"});
               // $('#Avatar').css({top:"0px"});


           });


   });
</script>

@include('sweetalert::alert')

</body>
</html>
