<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@php
   $company_name=App\Models\Company_settings::first();
@endphp

<title>{{$company_name->name}}</title>
<link rel="icon" href="{{asset($company_name->image)}}"
type = "image/x-icon">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{-- fontawesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />




 {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script> --}}

{{-- select2 --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <style>
.carousel-item {
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

.navbar-dark .navbar-brand{
font-family: 'Source Serif Pro', serif;

}

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


body
{
  overflow-x: hidden;
  /* background-image: url('asset(images/offCanvasBg.png')); */
  background-image: url({{asset('images/offCanvasBg.png')}});
}


a {
  text-decoration: none;
}

#btn {
  cursor: pointer;
  padding: 16px 20px;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  border-radius: 40px;
  color: #1a6eff;
  border: 1px solid #1a6eff;
  position: relative;
  -webkit-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -moz-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -ms-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -o-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}

#btn2 {
  cursor: pointer;
  padding: 16px 20px;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  border-radius: 40px;
  color: #c4c7ca;
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
  display: none;
}

#btn2 i {
  position: absolute;
  font-size: 12px;
  line-height: 0;
  top: 50%;
  margin-top: 1px;
  right: 15%;
  display: none;
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

#btn:hover i {
  display: block;
}

#btn2:hover {
  background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
}

#btn2:hover i {
  display: block;
}

#btn3:hover {
  background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
}

#btn3:hover i {
  display: block;
}


.courseitem
{
    position: absolute;
    /* background: #a98b53; */
    padding: 5px 15px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    right: 0px;
    top: 0;
    color: #fff;
    font-weight: 600;
    letter-spacing: .2px;

}
#upcomingimage
{
   opacity: 2.2;
}

#seminar
{
    background-image: url('{{asset('images/photo-1510070009289-b5bc34383727.avif')}}');
   /* background-image: url('images/photo-1510070009289-b5bc34383727.avif'); */
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
   background-image: url('{{asset('images/diggity-marketing-SB0WARG16HI-unsplash_cleanup.jpg')}}');
   /* background-color:rgba(0,0,0, 0.2); */


}
#cardbody
{

   background-color:rgba(87, 48, 48, 0.8);
}

@media only screen and (max-width: 599px) {
  #img {
         width: 30%;
  }
}

/* #footer
{
    background-image: url('images/photo-1505682634904-d7c8d95cdc50.avif');
    /* background-color: rgba(71, 46, 12, 0.6); */
    background-repeat: no-repeat;
} */

   </style>
   @yield('css')
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
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="background-image: url('{{URL::to($slider->image)}}')">



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
                  <span class="sr-only">Next</span>
               </a>
         </div>



         </header>

                     <!-- Page Content -->


                        <section>

                            <div class="container-fluid mt-5">

                                @yield('content')

                            </div>
                        </section>


                     {{-- page content end --}}



  @php
      $company=App\Models\Company_settings::first();
  @endphp


@include('backend.header-footer-files.js_files')
    {{-- footer  --}}

    @include('backend.footer')

    {{-- footer --}}


    {{-- Seminar Modals --}}


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


  <script>
          $(function () {
              $(document).scroll(function () {
                  var $nav = $("#mainNavbar");
                  $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
              });
          });
      </script>


<script>
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
</script>

<script>
    $('#batch').on('change',function()
    {

        const id = $(this).val();
        const courseid = $(this).attr("data-id");



   $.ajax({

            url : "{{ route('batch.id') }}",
            type : "get",
            data :
             {
                 id : id,
                 c_id: courseid

             },
            dataType:'json',



       success:function(res)
       {



            $('#type').val(res.day);
            $('#time').val(res.time);


       }
   });
})
</script>




<script>


   $('.criteria').on('change',function()

        {

            const id = $(this).val();
            const course_id=$(this).parent().closest('.course').attr('id');


            $.ajax({

                    url : "{{ route('orderSummery') }}",
                    type : "get",
                    data :
                    {
                        id : id,
                        c_id: course_id

                    },
                    dataType:'json',



                    success:function(res)
                    {


                        // $('#status').val(res.status);
                        //  $('#value').val(res.value);

                         document.getElementById("status").innerHTML = res.status;

                         document.getElementById("value").innerHTML = res.value;
                         document.getElementById("des").innerHTML = res.description;
                         document.getElementById("total").innerHTML = res.value;



                    }
                    });


        });



</script>



@method('js')



<script>


$(document).ready(function()
 {

    $('.select2').select2();


});
</script>




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

{{-- <script>


    $(document).ready(function()
     {

        $('.select2').select2();


    });
</script> --}}


@include('sweetalert::alert')
</body>
</html>
