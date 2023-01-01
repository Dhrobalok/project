@extends('backend.Dashboard.dashboardUser')


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

@php
    $payment=0;
@endphp

<div class="col-md-11">

        <p class="text-center">
            <img src="{{ asset('images/4WYgORYERneMHCAVLl4s.png') }}" alt="" width="50" style="border-radius: 80%;">


        </p>


    <div class="card">

        <div class="card-body shadow">



                {{-- @if ($userid->category_name)
                  {{$userid->category_name->name}}

                @else



                @endif --}}

                <table class="table table-borderless">

                    <tr>
                        <th>Your Billing Id</th>
                        @if ($userid)
                        <td>{{$userid->user_id}}</td>

                        @endif

                    </tr>

                    <tr>
                        <th>Course Name</th>
                        @if ($userid->course_id)
                        <td>{{$userid->course_id->name}}</td>
                        @else
                        <td>N/A</td>

                        @endif

                    </tr>

                    <tr>
                        <th>Course Fee</th>

                        <td>{{$userid->amount}} Tk</td>



                    </tr>

                    <tr>
                        <th> Payment System</th>
                        <td>{{$userid->criteria}}</td>
                    </tr>



                    <tr>
                        <th> Course Duration</th>

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
                                                 $payment=$userid->amount;
                                            @endphp

                                            N.B: You have to Pay{{$userid->amount}}

                                            @else

                                            N.B: You have to pay.

                                            @endif

                                    @endif


                                    @if ($userid->criteria=='fullpayment')
                                      @if ($userid->course_id)



                                            N.B: You have to Pay{{round($userid->amount-$userid->course_id->fullpayment)}}

                                            @php
                                                $payment=round($userid->amount-$userid->course_id->fullpayment);
                                            @endphp
                                      @endif

                                @endif



                                @if ($userid->criteria=='installment')
                                    @if ($userid->course_id)
                                    @php
                                        $payment=App\Models\Payment::where('course_id',$userid->course)->first();
                                    @endphp

                                    @if ($payment)

                                        <span style="color: red;">
                                            N.B: You have to Pay&nbsp;{{round($userid->amount/$payment->installment)}} for each month

                                        </span>
                                        <br>
                                        <br>

                                        <span align="center" style="color:green;">
                                            Number Of Installment {{$payment->installment}}

                                        </span>

                                        @php
                                        $payment=round($userid->amount/$payment->installment);
                                        @endphp

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
                                            $discount=round(($userid->amount*$promocode->discount)/100);
                                            $insrtallment=App\Models\Payment::where('course_id',$userid->course)->first();
                                        @endphp


                                        @php
                                         $payment=$userid->amount-$discount;
                                        @endphp


                                         <span align="center" style="color:red">
                                            N.B: You have to Pay {{$payment}}

                                         </span>

                                         <br>
                                         <br>
                                         <span align="center">

                                            N.B: Promocode Discount {{$promocode->discount}}%

                                         </span>



                                    @endif



                            @endif


                        </div>



                    </tr>









                </table>




                <div class="footer">

                     <div class="text-center">


                        <form action="{{route('Payment.confirm')}}" method="post">
                            @csrf

                            <input type="hidden" name="amount" value="{{$payment}}">
                            <input type="hidden" name="id" value="{{$userid->id}}">



                            <button class="btn btn-light">

                                <img src="{{asset('images/BKash-Icon2-Logo.wine.svg')}}" width="120" alt="">


                            </button>
                        </form>






                     </div>

                </div>



        </div>

    </div>

</div>





@endsection
