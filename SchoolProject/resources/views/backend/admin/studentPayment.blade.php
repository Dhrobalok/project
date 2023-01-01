@php
$total_discount=0;
$total_discount2=0;
$discountMoney1=0;
$discountMoney2=0;
$discountMoney3=0;
$total_d=0;
$total_d1=0;
$totalDistance=0;

@endphp


<table class="table table-striped w-auto" id="myTable3">


<thead>
  <tr>
      <th>Course&nbsp;Name</th>
      {{-- <th>Class&nbsp;Progress</th> --}}
      <th>Fee</th>
      <th>Paid</th>
      <th>Due</th>
      <th>Discount</th>
      <th>Special&nbsp;Discount</th>
      <th>status</th>
      <th>Action</th>


  </tr>
</thead>


<tbody>

  @foreach ($allcourse as $course)

      <tr>

          @php
                $name=App\Models\Course::where('id',$course->course)->first();

                $paymentEnroll=App\Models\Courseenroll::where('course',$course->course)
                ->where('user_id',$id)
                ->first();

                $payment=App\Models\Payment::where('course_id',$course->course)

                ->first();

                $coursepayment=App\Models\Coursepayment::where('user_id',$id)
                ->where('course_id',$course->course)
                ->where('active',1)

                ->sum('amount');

             // $totalmaount=SUM($coursepayment->amount);


                $discount=App\Models\Specialdiscount::where('course_id',$course->course)->first();
                $discountUser=App\Models\Discount::where('course_id',$course->course)
                    ->where('user_id',$id)

                    ->first();

                $specialOffer=App\Models\Specialoffer::where('course_id',$course->course)
                ->where('user_id',$id)

                ->first();
          @endphp






          <td>
            @if ($name)
              {{ucwords($name->name)}}
              @else
              N/a

            @endif


          </td>



          @if ($paymentEnroll->criteria=="installment")

          {{-- Installment part --}}

             <td>{{$paymentEnroll->amount}}</td>
             <td>{{$coursepayment}}</td>


                @if ($discountUser)

                    @if($discountUser->active==1 && $discountUser->s_active==1)

                            @php
                                $total_discount2=$discountUser->discount+$discountUser->special;
                                $discountMoney3=(($paymentEnroll->amount*$total_discount2)/100);
                                $totalFinal=$paymentEnroll->amount-$discountMoney3;


                                $discountMoney2=(($paymentEnroll->amount*$discountUser->special)/100);
                                $total_d1=$paymentEnroll->amount-$discountMoney2;
                            @endphp

                        <td>{{$totalFinal-$coursepayment}}</td>


                        @elseif ($discountUser->s_active==1)

                                @php
                                    // $total_discount2=$discountUser->discount+$discountUser->special;
                                    $discountMoney2=(($paymentEnroll->amount*$discountUser->special)/100);
                                    $total_d1=$paymentEnroll->amount-$discountMoney2;

                                @endphp

                            <td>{{$total_d1-$coursepayment}}</td>


                            @elseif ($discountUser->active==1)

                            @php
                                // $total_discount2=$discountUser->discount+$discountUser->special;
                                $discountMoney1=(($paymentEnroll->amount*$discountUser->discount)/100);
                                $total_d=$paymentEnroll->amount-$discountMoney1;
                            @endphp

                            <td>{{$total_d-$coursepayment}}</td>

                        @else


                        <td>{{$paymentEnroll->amount-$coursepayment}}</td>


                    @endif


                 @else
                    <td>{{$paymentEnroll->amount-$coursepayment}}</td>


                @endif

           {{-- Installment part end --}}


           @elseif ($paymentEnroll->criteria=="fullpayment")

               {{-- Fullpayment Start --}}

             <td>{{$paymentEnroll->amount}}</td>
             <td>{{$coursepayment}}</td>

                 @if ($discountUser)

                    @if($discountUser->active==1 && $discountUser->s_active==1)

                            @php
                                $total_discount2=$discountUser->discount+$discountUser->special;
                                $discountMoney3=(($paymentEnroll->amount*$total_discount2)/100);
                                $totalFinal=$paymentEnroll->amount-$discountMoney3;


                                $discountMoney2=(($paymentEnroll->amount*$discountUser->special)/100);
                                $total_d1=$paymentEnroll->amount-$discountMoney2;
                            @endphp

                        <td>{{$totalFinal-$coursepayment}}</td>


                        @elseif ($discountUser->s_active==1)

                                @php
                                    // $total_discount2=$discountUser->discount+$discountUser->special;
                                    $discountMoney2=(($paymentEnroll->amount*$discountUser->special)/100);
                                    $total_d1=$paymentEnroll->amount-$discountMoney2;

                                @endphp

                            <td>{{$total_d1-$coursepayment}}</td>


                            @elseif ($discountUser->active==1)

                            @php
                                // $total_discount2=$discountUser->discount+$discountUser->special;
                                $discountMoney1=(($paymentEnroll->amount*$discountUser->discount)/100);
                                $total_d=$paymentEnroll->amount-$discountMoney1;
                            @endphp

                            <td>{{$total_d-$coursepayment}}</td>

                        @else


                        <td>{{$paymentEnroll->amount-$coursepayment}}</td>


                    @endif


                @else
                    <td>{{$paymentEnroll->amount-$coursepayment}}</td>


                @endif


             {{-- Fullpayment End --}}


           @elseif ($paymentEnroll->criteria=="promocode")

               @php
                   $promocode=App\Models\Promocode::where('course_id',$course->course)->first();
                   $promodiscount=($name->fees*$promocode->discount)/100;

                   $totalpromo=$name->fees-$promodiscount;
               @endphp

               <td>{{$totalpromo}}</td>
               <td>{{$coursepayment}}</td>

               {{-- ProcodeCode End --}}

               @if ($discountUser)

               @if($discountUser->active==1 && $discountUser->s_active==1)

                       @php
                           $total_discount2=$discountUser->discount+$discountUser->special;
                           $discountMoney3=(($totalpromo*$total_discount2)/100);
                           $totalFinal=$totalpromo-$discountMoney3;


                           $discountMoney2=(($totalpromo*$discountUser->special)/100);
                           $total_d1=$totalpromo-$discountMoney2;
                       @endphp

                   <td>{{$totalFinal-$coursepayment}}</td>


                   @elseif ($discountUser->s_active==1)

                           @php
                               // $total_discount2=$discountUser->discount+$discountUser->special;
                               $discountMoney2=(($totalpromo*$discountUser->special)/100);
                               $total_d1=$totalpromo-$discountMoney2;

                           @endphp

                       <td>{{$total_d1-$coursepayment}}</td>


                       @elseif ($discountUser->active==1)

                       @php
                           // $total_discount2=$discountUser->discount+$discountUser->special;
                           $discountMoney1=(($totalpromo*$discountUser->discount)/100);
                           $total_d=$totalpromo-$discountMoney1;
                       @endphp

                       <td>{{$total_d-$coursepayment}}</td>

                   @else


                   <td>{{$totalpromo-$coursepayment}}</td>


               @endif


           @else
               <td>{{$totalpromo-$coursepayment}}</td>


           @endif




               {{-- ProcodeCode End --}}


            @else

              <td>{{$name->fees}}</td>

          @endif









          @if ($discount)

                  @if ($discountUser)

                     {{-- @if ($discountUser->discount!=0 && $discountUser->active==0)

                        <td><span style="color:red;">Pending</span></td> --}}


                        @if ($discountUser->discount!=0 && $discountUser->active!=0)

                            <td>
                                <span><i class="fas fa-check-square" style="color:rgb(141, 99, 99);">&nbsp;{{$discountUser->discount}}%</i></span>
                            </td>


                            @else

                            <td class="date" id="{{$id}}">
                                @can('add')
                                <a  href="javascript:void(0);" data-id="{{$course->course}}" class="btn btn-sm btn-info discount" style="font-size: 12px;">Set&nbsp;Discount</a>

                                @endcan

                            </td>

                      @endif


                     @else


                     <td class="date" id="{{$id}}">
                        @can('add')
                          <a  href="javascript:void(0);" data-id="{{$course->course}}" class="btn btn-sm btn-info discount" style="font-size: 12px;">Set&nbsp;Discount</a>

                        @endcan

                     </td>


                  @endif

                  {{-- discount end --}}





                    {{-- Special discount end --}}

           @else


             <td>N/A</td>
          @endif


          @if ($discountUser)

                     @if ($discountUser->special!=0 && $discountUser->s_active!=0)

                        <td>
                            <span><i class="fas fa-check-square" style="color:rgb(141, 99, 99);">&nbsp;{{$discountUser->special}}%</i></span>
                        </td>



                        @elseif($discountUser->special!=0 && $discountUser->s_active==0)

                        <td>
                            <span style="color:red;">Pending</span>
                        </td>


                        @else

                        <td class="date" id="{{$id}}">
                            @can('add')
                            <a  href="javascript:void(0);" data-id="{{$course->course}}" class="btn btn-sm btn-success special" style="font-size: 12px;">special&nbsp;Discount</a>

                            @endcan

                        </td>

                     @endif



                    @else

                    <td class="date" id="{{$id}}">

                        @can('add')
                        <a  href="javascript:void(0);" data-id="{{$course->course}}" class="btn btn-sm btn-success special" style="font-size: 12px;">special&nbsp;Discount</a>

                        @endcan

                    </td>

                  @endif


         @if ($course->active==0)

                    <td>
                        <span style="color:red">Inactive</span>

                    </td>


          @else

          <td>
            <span style="color:green">active</span>

        </td>

         @endif



          <td class="batchass" id="{{$id}}">

            <div class="d-flex gap-3">

                @php
                    $usertime=App\Models\Usertime::where('user_id',$id)
                    ->where('active',1)
                    ->first();
                @endphp

                @if ($usertime)

                @can('edit')


                <a  href="javascript:void(0);" data-id="{{$course->course}}" style="margin-right:5px" class="btn btn-sm btn-primary  editBatch" title="Change Batch"><i class="fas fa-edit">&nbsp;Change&nbsp;Batch</i></a>&nbsp;

                @endcan

                @else

                @can('add')
                <a  href="javascript:void(0);" data-id="{{$course->course}}" style="margin-right:5px" class="btn btn-sm btn-secondary assign" title="Assign Batch"><i class="fas fa-tasks">&nbsp;Assign&nbsp;Batch</i></a>&nbsp;

                @endcan




                @endif


                @can('add')
                <a  href="{{url('courseactive',$course->id)}}" data-id="{{$course->course}}" class="btn btn-sm btn-secondary" style="margin-right:5px"  title="Active"><i class="fas fa-check-square"></i></a>
                <a  href="{{url('courseinactive',$course->id)}}" data-id="{{$course->course}}" class="btn btn-sm btn-danger"><i class="fas fa-times" title="Inactive"></i></a>&nbsp;
                @endcan

                @can('view')

                  <a  href="{{url('downloadPayment',$course->id)}}" data-id="{{$course->course}}" class="btn btn-sm btn-success"><i class="fas fa-file-download" title="Payment Download"></i></a>

                @endcan

            </div>

          </td>

      </tr>

  @endforeach


</tbody>


</table>







