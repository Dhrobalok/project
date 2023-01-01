@extends('backend.Dashboard.master')


<style>
      #image
      {
        background-image: url('images/breadcumb-bg.jpg');
        background-color:rgba(77, 71, 71, 0.2);
      }
</style>

@section('content')



<div class="row justify-content-center">

    <div class="col-md-6 p-2">

            <div class="text-center">
                  <img src="{{URL::to($course->image)}}" width="50%"  alt="">

            </div>
       </div>


       <div class="col-md-6 p-4">

           <div class="card shadow">
               {{-- <div class="card-header">

                   <p class="p-2" style="line-height:25px; font-family:serif; font-">{{ucwords($course->description)}}</p>

               </div> --}}


               <div class="card-body table-responsive-sm">


                        <table class="table-borderless">

                            <tr>
                                <th>Course Fees</th>
                                <td></td>
                                <td>{{$course->fees}} <span style="font-family: serif;">&#2547;</span></td>

                            </tr>

                            @php
                                $payment=App\Models\Payment::where('course_id',$course->id)->first();
                            @endphp

                            @if ($payment)

                            <tr>
                                <th>Full Payment</th>
                                <td></td>

                                <td>{{$payment->fullpayment}}&nbsp;<span style="font-family: serif;">&#2547;</span></td>


                            </tr>

                            <tr>

                                <th>Full&nbsp;Payment&nbsp;Discount</th>
                                <td></td>

                                <td>{{$course->fees-$payment->fullpayment}}&nbsp;<span style="font-family: serif;">&#2547;</span></td>

                            </tr>


                            <tr>
                                <th>Installment&nbsp;Payment</th>

                                <td></td>


                                <td>{{$payment->installment_amount}}&nbsp;<span style="font-family: serif;">&#2547;</span>&nbsp;(&nbsp;{{$payment->installment_amount/$payment->installment}}&nbsp;<span style="font-family: serif;">&#2547;</span>&nbsp; Every Month)</td>




                            </tr>


                            <tr>
                                <th>Installment&nbsp;Period</th>

                                <td></td>


                                <td>{{$payment->installment}} Month</td>

                            </tr>



                                @endif












                            <tr>
                                <th>
                                    Course Duration
                                </th>

                                <td></td>

                                <td>{{$course->duration}}&nbsp;Months</td>
                            </tr>


                            <tr>
                                 <th>Certificate</th>

                                 <td></td>

                                 <td>After Complete all the class & Final exam and then Certificate.</td>
                            </tr>

                            <tr>
                                <th>Call</th>

                                <td></td>

                                <td>01762623193,02588801012 &nbsp;for more details</td>
                            </tr>


{{--
                             <tr>
                                <th>Select&nbsp;Class&nbsp;Time</th>
                                <td></td>

                                <td>
                                    <Select class="form-control" name>
                                        <option value="">Select Class Time</option>

                                        <option value="">cvbcbc</option>
                                    </Select>
                                </td>
                            </tr>


                            <tr>

                                <th>Select&nbsp;Day&nbsp;For&nbsp;Yor&nbsp;Class</th>
                                <td></td>

                                <td>
                                    <Select class="form-control" name>
                                        <option value="">SELECT DAY FOR YOUR CLASS</option>

                                        <option value="">cvbcbc</option>
                                    </Select>
                                </td>

                            </tr>



                            <tr>

                                <th>Select Payment Criteria</th>
                                <td></td>

                                <td>
                                    <Select class="form-control" name>
                                        <option value="">Select Payment Criteria</option>

                                        <option value="fullpayment">Fullpayment</option>
                                        <option value="installment">Installment</option>
                                    </Select>
                                </td>

                            </tr>


 --}}









                        </table>



                        <div class="row justify-content-center">
                            <div class="col-md-6 pt-4">

                                <a href="{{route('courseJoin',$course->id)}}" class="btn btn-primary">

                                    Join With Our Course

                                </a>

                                {{-- <button align="center" class="btn btn-primary">Join With Our Course</button> --}}

                            </div>


                        </div>





{{--
                        <h4 class="p-2">{{$course->fees}} </h4>
                        <p class="p-2" style=" font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size: 20px;">রেজিষ্ট্রেশনের শেষ সময় &nbsp;{{$course->l_day}}</p> --}}

               </div>

           </div>











       </div>

    </div>


     <div class="row justify-content-center">


              <div class="col-md-12">

                   <div class="card shadow">

                         <div class="card-header">

                               <h4 class="text-center">{{ucwords($course->name)}}&nbsp;Course Details</h4>

                         </div>

                         <div class="card-body">

                              <p style="font-family:sans-serif;">{{$course->description}}</p>

                         </div>

                   </div>

              </div>


    </div>

















@endsection
