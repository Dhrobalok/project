@extends('backend.Dashboard.dashboardUser')

@section('css')
<style>




 .fs-card-origin-price {
    font-size: 15px;
    line-height: 12px;
    margin-bottom: 4px;
}

.currency
{
    font-size: 15px;

}

.courseitem
{
    position: absolute;
    background: #a98b53;
    padding: 5px 15px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    right: 1px;
    top: 0;
    color: #fff;
    font-weight: 600;
    letter-spacing: .2px;

}
</style>
@endsection

@section('content')


@foreach ($allcourse as $allcourse)
@php

$allseat=App\Models\Batch::
where('course_id',$allcourse->id)
->where('active',1)
->sum('seat');

@endphp

<div class="col-md-4 p-4">
<div class="card shadow h-100 bg-blue-lightest">

   <div class="header">
      <div class="courseitem">

        @if ($allcourse->learning_site==2)
           Offline

         @else

         Online

        @endif

     </div>

      <img src="{{URL::to($allcourse->image)}}" width="100%" height="120">

   </div>







         <div class="d-flex mt-2">
            <span style="font-weight: bold;">CourseName&nbsp;</span>
            <span></span>
            <span>&nbsp;{{ucwords(preg_replace('/\s+/', '', $allcourse->name))}}</span>

         </div>


         {{-- <div class="d-flex">
            <span>Method&nbsp;</span>
            <span>:</span>
            <span>&nbsp;Offline</span>
         </div> --}}

         @php
            $time=\Carbon\Carbon::now()->format('m-d-y');
            $discount=App\Models\Payment::where('course_id',$allcourse->id)->first();
      @endphp




               @if ($discount)

               @if($discount->s_date!=null)

                  @if ($discount->s_date>=$time && $time<=$discount->e_date)

                        <div class="d-flex mt-2">

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

                        <div class="d-flex mt-2">
                           <span style="font-weight: bold;">Course Fees</span>
                           <span>&nbsp;&nbsp;</span>

                              <span>{{$allcourse->fees}}</span>
                              <span class="currency" style="font-family: serif;">&#2547;</span>

                        </div>

               @endif


               @else


                  <div class="d-flex mt-2">

                     <span style="font-weight: bold;">Course Fees</span>
                     <span>&nbsp;&nbsp;</span>
                     <span>{{$allcourse->fees}}</span>

                     <span class="currency" style="font-family: serif;">&#2547;</span>

                  </div>







               @endif


               @else

               <div class="d-flex mt-2 ">
                  <span style="font-weight: bold;">Course Fees</span>
                  <span>&nbsp;&nbsp;</span>
                  <span>{{$allcourse->fees}}</span>

               <span class="currency" style="font-family: serif;">&#2547;</span>


               </div>


               @endif


               <div class="d-flex mt-2">

                <span style="font-weight: bold;">Seat</span>
                <span>&nbsp;&nbsp;</span>
                <span>{{$allseat}}</span>



             </div>

         <div  class="text-center p-2 mt-2">
            <a href="{{route('userenrol.details',$allcourse->id)}}">
               <button role="button" class="btn btn-outline-primary btn-sm btn-iconed btn-rounded">
                   <span class="spn" style="color: rgb(41, 40, 37);">Enroll Course</span>
               </button>

            </a>

         </div>



      </div>

   </div>

   @endforeach

      {{-- @foreach ($allcourse as $course)
         <div class="col-md-3">
            <a href="{{route('userenrol.details',$course->id)}}" style="color:black;">
               <div class="card shadow py-4" style="height: 100%">
                   <div class="card-header">
                       <img src="{{URL::to($course->image)}}" width="100%">

                   </div>

                   <div class="card-body" >

                <table class="table table-borderless">
                    <tr>
                        <th>Course&nbsp;Name </th>

                        <td>{{ucwords($course->name)}}</td>
                    </tr>

                    @php
                        $time=\Carbon\Carbon::now()->format('m-d-y');
                        $discount=App\Models\Payment::where('course_id',$course->id)->first();
                    @endphp
                    <tr>
                        <th>Course&nbsp;Fees</th>


                        @if ($discount)

                              @if($discount->s_date!=null)

                                  @if ($discount->s_date>=$time && $time<=$discount->e_date)
                                        <td>
                                            <div class="fs-card-price">

                                                <span>{{$course->fees-$discount->fullpayment}}</span>
                                                <span class="currency" style="font-family: serif;">&#2547;</span>
                                            </div>

                                            <div class="fs-card-origin-price">

                                                <del>


                                                    <span>{{$course->fees}}</span>
                                                    <span class="currency" style="font-family: serif;">&#2547;</span>

                                                </del>


                                            </div>
                                        </td>

                                        @else
                                        <td>
                                            <div>


                                                {{$course->fees}}
                                                <span class="currency" style="font-family: serif;">&#2547;</span>

                                            </div>
                                        </td>
                                  @endif


                                  @else

                                  <td>
                                    <div>


                                        {{$course->fees}}
                                        <span class="currency" style="font-family: serif;">&#2547;</span>

                                    </div>


                                  </td>




                                @endif


                          @else

                          <td>
                            {{$course->fees}}

                            <span class="currency" style="font-family: serif;">&#2547;</span>


                        </td>


                        @endif




                    </tr>

                 </table>

                   </div>

                </div>

              </a>
            </div>








      @endforeach --}}

@endsection
