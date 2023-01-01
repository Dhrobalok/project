@extends('backend.Dashboard.master')

@section('css')
<style>
.select2-container--default .select2-search--inline .select2-search__field

{
    background: transparent;
    /* background-color: #081824 !important; */

    outline: 0;
    outline-color: initial;
    outline-style: initial;
    outline-width: 0px;
    box-shadow: none;
    -webkit-appearance: textfield;
    width:220px!important;
    /* border: 1px solid rgb(83, 74, 74) !important;
    color: black!important; */
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #8d6d6d !important;
    border: 1px solid rgb(53, 47, 47)!important;
    border-radius: 4px;


}


</style>

@endsection
@section('content')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


        @if (session('msg'))
        <div>
        <script>
            alert('Registration time is end for this course')
        </script>
        </div>
        @endif

        @if (session('alarm'))
        <div>
        <script>
            alert('Please choose criteria or promocode')
        </script>
        </div>
        @endif

        @if (session('alarm2'))
        <div>
        <script>
            alert('This promocode not match with our code')
        </script>
        </div>
        @endif



  <div class="row justify-content-center">
      <div class="col-md-7">

            <div class="card shadow">
              <div class="card-header text-center">

                  <h4>Billing Details</h4>

              </div>

              <div class="card-body">
                <form action="{{route('register')}}" method="POST">

                  {{-- <form action="{{route('enroll.course')}}" method="POST"> --}}
                    @csrf

                    <input type="hidden" name="course_id" value="{{$coursedetails->id}}">

                            <div class="row justify-content-start">

                                <div class="col-md-6">

                                    <label>Name</label><span class="text-danger">*</span></label>

                                </div>


                                <div class="col-md-6">
                                    <label>Phone No</label><span class="text-danger">*</span></label>

                                </div>




                            </div>


                            <div class="row form-group justify-content-start">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">

                                </div>


                                <div class="col-md-6">
                                    <input type="text" name="mobile" class="form-control" placeholder="Phone No" required>

                                </div>


                                {{-- <div class="col-md-6">

                                    @php
                                        $batch=App\Models\Batch::select('batch_number')
                                        ->where('course_id',$coursedetails->id)
                                        ->where('active',1)
                                        ->distinct()->get();
                                    @endphp

                                     <select name="batch" id="batch" data-id={{$coursedetails->id}} class="form-control" required>

                                        <option value="">Choose Batch</option>

                                        @foreach ($batch as $batchall)
                                           <option value="{{$batchall->batch_number}}">Batch Number {{$batchall->batch_number}} </option>

                                        @endforeach

                                     </select>

                                </div> --}}

                            </div>




                            <div class="row justify-content-start">

                                        <div class="col-md-6">

                                            <label>Email</label><span class="text-danger">*</span></label>

                                        </div>


                                        <div class="col-md-6">

                                            <label>Password</label><span class="text-danger">*</span></label>

                                        </div>


                                </div>


                                <div class="row form-group justify-content-start">

                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>

                                        @error('email')
                                         <div class="error" style="color:red;">{{ $message }}</div>
                                       @enderror

                                    </div>

                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>

                                    </div>

                                </div>



                                <div class="row justify-content-start">

                                        <div class="col-md-6">

                                            <label>Class Time</label><span class="text-danger">*</span></label>

                                        </div>

                                        <div class="col-md-6">

                                            <label> Class Day</label><span class="text-danger">*</span></label>

                                        </div>

                            </div>


                                @php
                                     $allday=App\Models\Batch::where('course_id',$coursedetails->id)
                                    ->where('active',1)
                                    ->get();
                                    $onlyday=App\Models\Batch::where('course_id',$coursedetails->id)
                                    ->where('active',1)
                                    ->first();
                               @endphp

                            <div class="row form-group justify-content-start">


                                <div class="col-md-6">
                                    <select name="time[]"  class="form-control select2"  multiple required>
                                        <option value="">Select Time</option>
                                        {{-- <option value="{{$onlyday->time}}">{{$onlyday->time}}</option> --}}

                                          @foreach ($allday as $day)

                                          <option value="{{$day->time}}">{{$day->time}}</option>

                                          @endforeach




                                  </select>





                                </div>


                                <div class="col-md-6">

                                    <select name="day[]" id="" class="form-control select2"  multiple required>
                                        {{-- <option value="{{$onlyday->day}}">{{$onlyday->day}}</option> --}}
                                         <option value="" >Select Day</option>
                                          @foreach ($allday as $day)

                                          <option value="{{$day->day}}">{{$day->day}}</option>

                                          @endforeach




                                  </select>

                                </div>

                            </div>







                            <div class="row justify-content-start">

                                <div class="col-md-12">
                                    <label>Select Payment Criteria</label><span class="text-danger">*</span></label>

                                </div>



                            </div>


                            <div class="row form-group justify-content-start">



                                 <div class="col-md-12">

                                    <div class="course" id="{{$coursedetails->id}}">

                                        <input type="radio" onchange="changePaymenttype('regularpayment')" name="criteria" value="regularpayment" class="criteria">&nbsp;<span style="font-weight: bold;">RegularPayment</span>

                                        @php

                                            $time=\Carbon\Carbon::now()->format('m-d-y');
                                            $userpayment=App\Models\Payment::where('course_id',$coursedetails->id)

                                            ->first();
                                        @endphp


                                            @if ($userpayment)
                                              @if ($userpayment->s_date>=$time && $time<=$userpayment->e_date)
                                              <input type="radio" name="criteria" onchange="changePaymenttype('fullpayment')" value="fullpayment" class="criteria">&nbsp;<span style="font-weight: bold;">Fullpayment</span>

                                             @endif

                                            @endif





                                        <input type="radio" name="criteria"  onchange="changePaymenttype('installment')" value="installment" class="criteria">&nbsp;<span style="font-weight: bold;">Installment</span>



                                        <input type="radio" name="criteria"  onchange="changePaymenttype('promocode')" value="promocode" class="criteria">&nbsp;<span style="font-weight: bolod;">PromoCode</span>

                                    </div>







                                        <div>



                                            <div class="paymenttype" id="promocode" style="display: none;">


                                                @php
                                                 $course=App\Models\Promocode::where('course_id',$coursedetails->id)->first();
                                               @endphp

                                                <span style="color:red;">

                                                    You get
                                                    @if ($course)
                                                       {{$course->discount}}% discount for Promocode.


                                                    @else

                                                     N/a discount for Promocode.

                                                    @endif
                                                </span>

                                                <input type="text"   class="form-control" name="promocode" placeholder="Enter Promocode">

                                            </div>




                                        <div class="paymenttype" id="regularpayment" style="display: none;">

                                            @php
                                                $course=App\Models\Course::where('id',$coursedetails->id)->first();
                                            @endphp

                                            <span style="color:red;">

                                                You have to pay
                                                {{$course->fees}} Tk for regular pay
                                            </span>

                                        </div>


                                        <div class="paymenttype" id="fullpayment" style="display: none;">

                                            @php
                                              $coursefees=App\Models\Course::where('id',$coursedetails->id)->first();
                                             @endphp

                                            @php
                                                $course=App\Models\Payment::where('course_id',$coursedetails->id)->first();
                                            @endphp

                                            <span style="color:red;">

                                                You have to pay
                                                @if ($course)

                                                          {{round($coursefees->fees-$course->fullpayment)}} Tk for fullpay

                                                          @endif
                                                {{-- {{round($coursefees->fees-$course->fullpayment)}} Tk for fullpay --}}
                                            </span>

                                        </div>


                                        <div class="paymenttype" id="installment"style="display: none;">

                                            @php
                                              $time=\Carbon\Carbon::now()->format('m-d-y');
                                              $coursefees=App\Models\Course::where('id',$coursedetails->id)->first();
                                             @endphp

                                            @php
                                                  $course=App\Models\Payment::where('course_id',$coursedetails->id)->first();
                                            @endphp


                                           @if ($course)

                                           @if ($course->s_date>=$time && $time<=$course->e_date)


                                           <span style="color:red;">
                                                You have to pay
                                                {{round(($coursefees->fees-$course->installment_amount)/$course->installment)}} Tk

                                                each month for installment
                                            </span>

                                            <br>
                                            <span style="color:red;">
                                                Installment Time {{$course->installment}} Months
                                            </span>


                                        @else

                                            <span style="color:red;">
                                                You have to pay
                                                {{round($coursefees->fees/$course->installment)}} Tk

                                                each month for installment
                                            </span>

                                            <br>
                                            <span style="color:red;">
                                                Installment Time {{$course->installment}} Months
                                            </span>

                                       @endif


                                @endif




                                        </div>

                                 </div>



                                </div>



                            </div>



                            <div class="row justify-content-center">

                                      <button class="btn btn-primary">Submit</button>
                            </div>


                  </form>



              </div>

         </div>


      </div>




      <div class="col-md-5">

          <div class="card shadow">

              <h4 class="text-center mt-2">Order Summary</h4>

              <div class="card-header text-center">

                  <img  src="{{URL::to($coursedetails->image)}}" width="90" alt="">

              </div>

              <div class="card-body">

                         <table class="table table-borderless">

                            <tbody>

                                <tr>
                                    <th>Payment&nbsp;Criteria</th>



                                    <td id="status">

                                    </td>
                                </tr>

                                <tr>
                                    <th>Amount</th>



                                    <td id="value">


                                    </td>

                                    <td><span style="font-family: serif;">&#2547;</span></td>
                                </tr>

                                <tr>
                                    <th>Description</th>


                                    <td id="des"></td>

                               </tr>

                                <tr>
                                    <th>Total</th>
                                    <td id="total"></td>
                                    <td><span style="font-family: serif;">&#2547;</span></td>
                                </tr>
                            </tbody>


                         </table>



              </div>

          </div>

      </div>


  </div>


@endsection

@push('js')




@endpush



