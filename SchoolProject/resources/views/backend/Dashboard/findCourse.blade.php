@extends('backend.Dashboard.master')


@section('content')


{{-- Off Line Course --}}
      <section>

           <div class="container">
            <h4 class="text-center">
               Offline Course
           </h4>

         <div class="row justify-content-center mt-4">
           @foreach ($offline as $allcourse)
           @php

           $allseat=App\Models\Batch::
           where('course_id',$allcourse->id)
           ->where('active',1)
           ->sum('seat');

     @endphp

        <div class="col-md-4 p-2">
           <div class="card shadow h-100 bg-blue-lightest mt-2">

              <div class="header">
               <div class="courseitem" style="background-color: #a98b53;">

                   Offline
               </div>

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

                    {{-- <div class="d-flex">
                       <span>Course&nbsp;Fees&nbsp;</span>
                       <span>:</span>
                       <span>&nbsp;{{$allcourse->fees}}</span>
                    </div> --}}


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
     </section>

     {{-- Off Line Course --}}




     {{-- On Line Course --}}
     <section>

            <div class="container">
               <h4 class="text-center mt-4">
                  Online Course
              </h4>

            <div class="row justify-content-center mt-4">
              @foreach ($online as $allcourse)
              @php

              $allseat=App\Models\Batch::
              where('course_id',$allcourse->id)
              ->where('active',1)
              ->sum('seat');

        @endphp

           <div class="col-md-4 p-2">
              <div class="card shadow h-100 bg-blue-lightest">

                 <div class="header">

                  <div class="courseitem" style="background-color: #1d891d;">

                      Online
                  </div>

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

                       {{-- <div class="d-flex">
                          <span>Course&nbsp;Fees&nbsp;</span>
                          <span>:</span>
                          <span>&nbsp;{{$allcourse->fees}}</span>
                       </div> --}}


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




  </section>

  {{-- on Line Course --}}
@endsection

