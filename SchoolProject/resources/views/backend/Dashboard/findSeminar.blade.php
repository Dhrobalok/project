  @extends('backend.Dashboard.master')

  @section('content')

  @php
  $seminar=App\Models\Upcomingcourse::where('status','seminar')->get()
@endphp


<section id="seminar">

    <div class="overlaw py-5">

        <div class="container-fluid" >




            <div class="row justify-content-center">
                <h4 class="text-center" style="color:aliceblue;font-weight:bold;">Seminers and Webiners</h4>

             </div>

            <div class="row justify-content-center pt-3">



                @foreach ($seminar as $upcomings)
                <div class="col-md-4 p-3">
                         <div class="card shadow h-100 bg-blue-lightest" id="seminarCard">




                         {{-- <div class="header">


                            <img src="{{URL::to($upcomings->image)}}" width="100%" height="120">

                         </div> --}}

                            @php
                                    $string = preg_replace('/\s+/', '', $upcomings->name);
                                              $course=str_split($string);
                            @endphp


                             <div class="row justify-content-center mt-4  pt-4 m-4 h-100">
                               @foreach($course as $val)

                               {{-- <div align="center"> --}}

                                <div class="card shadow  mb-1" style="background-color:#c4c7ca;width:25px; height:25px;">

                                    <p class="text-center" style="color:#232425;">{{ucwords($val)}}</p>

                              </div>




                               {{-- </div> --}}


                            @endforeach



                             </div>


                            <div class="card-body" id="cardbody">

                               <h5 class="text-center mt-4" style="font-weight: bold;color:#fff;">{{ucwords($upcomings->name)}}</h5>

                               <div  class="text-center mt-4 p-4">


                                    <a  data-id="{{$upcomings->id}}" class="seminarDetails" id="btn3">Details&nbsp;&nbsp;<i class="fas fa-arrow-right" style="font-size:10px; "></i></a>


                                     {{-- <button type="button" data-id="{{$upcomings->id}}"   class="btn btn-outline-primary btn-sm  btn-rounded seminarDetails" >
                                        <span class="spn" style="color: rgb(241, 240, 234);">Details&nbsp;<i class="fas fa-arrow-right" style="font-size:10px; "></i></span>
                                     </button> --}}


                                     {{-- <button type="button" data-id="{{$upcomings->id}}"   class="btn btn-outline-primary btn-sm  btn-rounded CancelDetails" hidden>
                                        <span class="spn" style="color: rgb(241, 240, 234);">Details</span>
                                     </button> --}}



                               </div>



                               <div  class="showDate{{$upcomings->id}} text-center mt-4" style="display: none;">

                                <div class=" mt-2">
                                    <span style="font-weight: bold;color:#fff;">Seminar Date</span>

                                    <span style="font-weight: bold;color:#fff;">&nbsp;&nbsp;:</span>



                                       {{-- <span>{{$allcourse->fees}}</span> --}}
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


        </div>
    </div>


</section>

  @endsection


  @push('js')







  @endpush
