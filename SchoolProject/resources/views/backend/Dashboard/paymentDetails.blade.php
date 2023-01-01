@extends('backend.Dashboard.master')


<style>
    #myTable th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 10px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }

/* .table-responsive
{
    overflow-x: hidden !important;
} */

#myTable_filter
{
    float: right !important;
}
</style>

@section('content')



        <p class="text-center">
            <img src="{{ asset('images/4WYgORYERneMHCAVLl4s.png') }}" alt="" width="50" style="border-radius: 80%;">


        </p>







    <div class="card">

        <div class="card-body shadow">




            <table class="table table-borderless">

                        <tr>
                            <th>Your Billing Id</th>
                            @if ($userid)
                            <td>{{$userid->user_id}}</td>

                            @endif

                        </tr>

                        <tr>

                            @php
                                $course=App\Models\Course::where('id',$userid->course)->first();
                            @endphp

                            <th>Course Name</th>
                            @if ($course)
                            <td>{{$course->name}}</td>
                            @else
                            <td>N/A</td>

                            @endif

                        </tr>

                        <tr>
                            <th> Payment System</th>
                            <td>{{$userid->criteria}}</td>
                        </tr>

                        <tr>
                            <th> Payment Duration</th>

                            @if ($userid->course_id)
                            <td>{{$userid->course_id->duration}}&nbsp;Month</td>

                            @endif

                        </tr>


                        <tr>

                            <div class="text-center p-2">

                                @if ($userid->criteria=='regularpayment')

                                    @php
                                    $payment=App\Models\Course::where('id',$userid->course)->first();
                                    @endphp
                                    @if ($payment)

                                       @php
                                           $money=$payment->fees;
                                       @endphp

                                    N.B: You have to Pay{{$payment->fees}}

                                    @else

                                    N.B: You have to pay.

                                    @endif




                                @endif

                                 @if ($userid->criteria=='fullpayment')
                                    @if ($userid->course_id)

                                      @php
                                       $money=$userid->course_id->fullpayment;
                                     @endphp

                                        N.B: You have to Pay{{$userid->course_id->fullpayment}}
                                    @endif

                                 @endif



                            @if ($userid->criteria=='installment')
                                @if ($userid->course_id)
                                @php
                                    $payment=App\Models\Payment::where('course_id',$userid->course)->first();
                                @endphp

                                @if ($payment)

                                  @php
                                     $money=$payment->installment_amount/$payment->installment;
                                  @endphp

                                    <span style="color: red;">
                                        N.B: You have to Pay{{$money}} for each month

                                    </span>


                                 @else

                                    <span style="color: red;">
                                        N.B: You have to Pay  for each month

                                    </span>


                                @endif


                                @endif

                            @endif


                            @if ($userid->criteria=='promocode')

                            @php
                                $promocode=App\Models\Promocode::where('course_id',$userid->course)->first();
                            @endphp


                            @if ($promocode)

                                @php
                                    $payment=($userid->course_id->fees*$promocode->discount)/100;
                                    $insrtallment=App\Models\Payment::where('course_id',$userid->course)->first();
                                @endphp


                                @php
                                  $money=$userid->course_id->fees-$payment;
                                @endphp


                                N.B: You have to Pay {{$money}}







                            @endif





                    @endif


                            </div>



                        </tr>


            </table>








                <div class="footer">

                     <div class="text-center">

                        <form action="{{route('Payment.save')}}" method="post">
                            @csrf

                            <input type="hidden" name="amount" value="{{$money}}">
                            <input type="hidden" name="id" value="{{$userid->id}}">



                            <button class="btn btn-light">

                                <img src="{{asset('images/BKash-Icon2-Logo.wine.svg')}}" width="120" alt="">


                            </button>
                        </form>



{{--
                        <a href="#">

                            <img src="{{asset('images/BKash-Icon2-Logo.wine.svg')}}" width="120" alt="">


                        </a> --}}



                     </div>

                </div>



        </div>

    </div>







@endsection
