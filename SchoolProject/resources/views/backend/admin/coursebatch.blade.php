@extends('backend.Dashboard.AdminDashUser')
<style>
 #mytable th
 {
     color:rgb(250, 235, 235);
 font-size:13px;
 line-height: 4px;
 text-transform:capitalize;
 font-weight: 400px !important;
 width: 20px !important;
 background-color: rgb(129, 152, 212)
 }

 #mytable td
 {

 font-size:14px;
 line-height: 17px;
 text-transform:capitalize;
 font-weight: 400px !important;
 width: 20px !important;

 }



 #myTable2 th
 {
     color:rgb(250, 235, 235);
 font-size:13px;
 line-height: 4px;
 text-transform:capitalize;
 font-weight: 400px !important;
 width: 20px !important;
 background-color: rgb(129, 152, 212)
 }

 #myTable2 td
 {

 font-size:14px;
 line-height: 17px;
 text-transform:capitalize;
 font-weight: 400px !important;
 width: 20px !important;

 }



/* .table-responsive
{
 overflow-x: hidden !important;
} */

#myTable_filter
{
 float: right !important;
}

#list
{
    width: 340px !important;
}

/* .modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 700px !important;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 0.3rem;
    box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 50%);
    outline: 0;
} */

.modal-content {
  position: relative;
  width: auto;
  margin: 10px;
}
</style>

@section('content')

<div class="col-md-12">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">
            @can('add')
            <a  href="#" id="addbatch" class="btn btn-sm btn-primary" style="font-size: 12px;"><i class="fa fa-users p-1" aria-hidden="true">&nbsp;AddBatch</i></a>

            @endcan


        </div>



        <div class="card-body">



            <div class="table-responsive p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100 js-dataTable-full" id="mytable">



                  <thead>

                          <th>Id</th>
                          <th>Course&nbsp;Name</th>

                          <th>Batch&nbsp;No</th>
                          <th>Total&nbsp;Member</th>
                          <th>Class&nbsp;Day</th>
                          <th>Class&nbsp;Time</th>
                          <th>Class&nbsp;Start</th>
                          <th>Class&nbsp;End</th>
                          <th>Remaining&nbsp;Seat</th>

                          <th>Status</th>


                          <th>Action</th>

                  </thead>

                  <tbody>

                    @php
                         $i=1;
                    @endphp



                        @foreach ($batchinfo as $allcontent)
                            @php
                                    $batchall=App\Models\Batch::select('batch_number')->where('course_id',$allcontent->course_id)->distinct()->get();
                                    $courseName=App\Models\Course::where('id',$allcontent->course_id)->first();

                            @endphp

                           @foreach ($batchall as $batch)

                             @php
                                 $batchmemeber=App\Models\Courseenroll::where('course',$allcontent->course_id)
                                 ->where('batch',$batch->batch_number)
                                 ->get();

                                 $batchday=App\Models\Batch::where('course_id',$allcontent->course_id)
                                 ->where('batch_number',$batch->batch_number)
                                 ->first();

                                 $totalmember=count($batchmemeber);
                             @endphp

                           <tr>
                            <td>{{$i++}}</td>

                            @if ($courseName)
                              <td>{{ucwords($courseName->name)}}</td>


                              @else

                              <td>N/A</td>

                            @endif

                            <td>{{$batch->batch_number}}</td>

                            <td>{{$totalmember}}</td>

                            @if ($batchday)
                                <td>{{$batchday->day}}</td>
                                <td>{{$batchday->time}}</td>
                                <td>{{$batchday->s_date}}</td>
                                <td>{{$batchday->l_date}}</td>

                            @else

                              <td>N/A</td>
                              <td>N/A</td>
                              <td>N/A</td>
                              <td>N/A</td>

                            @endif

                            @php
                                App\Models\Courseenroll::where('course',$allcontent->course_id)
                                ->where('')
                            @endphp

                            <td>{{$batchday->seat}}</td>




                            @if ($batchday->active==0)

                                 <td><span style="color: red">Close</span></td>

                            @else

                              <td><span class="btn-primary active p-1">Running</span></td>


                            @endif






                            <td id={{$allcontent->course_id}} class="date">

                                <div class="d-flex">

                                    @can('view')
                                            <a href="javascript:void(0);" data-id="{{$batch->batch_number}}" class="btn btn-sm btn-primary payment" title="View Batch"><i class="fas fa-eye" style="font-size: 12px;"></i>
                                                {{-- <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> --}}
                                            </a>
                                            &nbsp;
                                    @endcan



                                    @can('edit')

                                      <a href="javascript:void(0);" data-id="{{$batch->batch_number}}" class="btn btn-sm btn-primary edit" title="Edit Batch"><i class="fas fa-Edit" style="font-size: 12px;"></i></a>
                                        &nbsp;
                                    @endcan



                                        @can('add')

                                          <a href="javascript:void(0);" data-id="{{$batch->batch_number}}" class="btn btn-sm btn-primary active" title="Active Batch"><i class="fas fa-check-square" style="font-size: 12px;"></i></a>
                                           &nbsp;
                                           {{-- <a href="javascript:void(0);" data-id="{{$batch->batch_number}}" class="btn btn-sm btn-secondary active " title="Active Batch"><i class="fas fa-check-square" style="font-size: 15px;"></i></a>&nbsp; --}}
                                           <a href="javascript:void(0);" data-id="{{$batch->batch_number}}" class="btn btn-sm btn-danger delete " title="Close Batch"><i class="fas fa-times" style="font-size: 12px;"></i></a>

                                           &nbsp;
                                           <a href="javascript:void(0);" data-id="{{$batch->batch_number}}"  class="btn btn-sm btn-secondary sms" title="Send Message"><i class="fas fa-envelope"></i></a>
                                        @endcan





                                </div>
                            </td>


                        </tr>

                        @endforeach


                     @endforeach




                  </tbody>

                </table>

            </div>


        </div>

    </div>


 </div>


  {{-- Add Batch --}}

 <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Add&nbsp;Batch

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('Course.batch')}}" enctype="multipart/form-data">
                    @csrf


                                    <div class="row justify-content-start">


                                        <div class="col-md-6">
                                            <label>Select Course</label><span class="text-danger"></span></label>
                                        </div>


                                        <div class="col-md-6">
                                            <label>Batch Number</label><span class="text-danger"></span></label>
                                        </div>

                                    </div>

                                <div class="row form-group justify-content-start">

                                    <div class="col-md-6">
                                        @php
                                            $courseall=App\Models\Course::where('active',1)->get();
                                        @endphp

                                        <select name="course_id" class="form-control">
                                            <option value="">Select Option</option>

                                            @foreach ($courseall as $allcourse)
                                               <option value="{{$allcourse->id}}">{{$allcourse->name}}</option>

                                            @endforeach


                                        </select>

                                    </div>


                                    <div class="col-md-6">
                                        <input type="text" name="batch_number" class="form-control" placeholder="Batch Number" >

                                     </div>

                                </div>





                                <div class="row justify-content-start">


                                    <div class="col-md-6">
                                        <label>Class&nbsp;Seat</label><span class="text-danger"></span></label>
                                    </div>

                                </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">
                                     <input type="text" name="seat" class="form-control" placeholder="Class seat">
                                </div>

                            </div>






                                <div class="row justify-content-start">


                                    <div class="col-md-6">
                                        <label>Class&nbsp;Time</label><span class="text-danger"></span></label>
                                    </div>

                                </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">
                                     <input type="text" name="time" class="form-control" placeholder="Class time">
                                </div>

                            </div>




                            <div class="row justify-content-start">


                                <div class="col-md-6">
                                    <label>Start&nbsp;Date</label><span class="text-danger"></span></label>
                                </div>


                                <div class="col-md-6">
                                    <label>End&nbsp;Date</label><span class="text-danger"></span></label>
                                </div>


                            </div>

                        <div class="row form-group justify-content-start">

                            <div class="col-md-6">
                                 <input type="date" name="s_date" class="form-control" placeholder="Class time">
                            </div>

                            <div class="col-md-6">
                                <input type="date" name="l_date" class="form-control" placeholder="Class time">
                           </div>

                        </div>



                        <table class="table table-borderless" >

                                <tr>
                                    <th>Class Day</th>
                                </tr>

                                <tr>

                                    <td>


                                        <input type="checkbox" class="days" name='day[]' value="Sat"/>Sat
                                        <input type="checkbox" class="days" name='day[]' value="Sun"/>Sun
                                        <input type="checkbox" class="days" name='day[]' value="Mon"/>Mon
                                        <input type="checkbox" class="days" name='day[]' value="Tues"/>Tues
                                        <input type="checkbox" class="days" name='day[]' value="Wed"/>Wed
                                        <input type="checkbox" class="days" name='day[]' value="Thur"/>Thur
                                        <input type="checkbox" class="days" name='day[]' value="Fri"/>Fri

                                        </div>



                                    </td>





                                </tr>



                            </table>








                    <div class="row justify-content-center mt-4">


                            <button  class="btn btn-primary">Course&nbsp;Save</button>




                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>
  </div>




  {{-- Send Sms --}}

 <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:rgb(65, 62, 67);">
                Write SMS Here (Batch Wise SMS)

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('sms.post')}}" enctype="multipart/form-data">
                    @csrf



                      <div id="send_sms">

                      </div>




                    <div class="row justify-content-center mt-4">

                            <button  class="btn btn-primary">Send&nbsp;Sms</button>

                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>
  </div>


  {{-- View Payment --}}



 <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:rgb(65, 62, 67);">
                Payment Details

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100">


                        <thead>
                            <tr>
                                <th>Id</th>

                                <th>Student Name</th>

                                <th>Course Name</th>
                                <th>Payemnt Status</th>
                            </tr>
                        </thead>

                        <tbody id="viewpayment">

                        </tbody>




                    </table>

                </div>



          ...
        </div>

      </div>
    </div>
  </div>


  {{-- Edit Batch --}}



 <div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:rgb(65, 62, 67);">
                Edit Batch

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">


            <form action="{{route('update.batch')}}" method="post">
                @csrf

                <input type="hidden" id="id" name="id">

                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <label for="">Batch&nbsp;Number</label>

                    </div>

                    <div class="col-md-6">
                        <label for="">Day</label>

                    </div>

                 </div>


                 <div class="row form-group justify-content-start">

                    <div class="col-md-6">
                        <input type="text" name="batch_number" class="form-control" id="batch_number" >

                    </div>

                    <div class="col-md-6">

                         <input type="text" name="day" class="form-control" id="day">


                    </div>

                 </div>


                 <div class="row justify-content-start">
                    <div class="col-md-6">
                        <label for="">Time</label>

                    </div>

                    <div class="col-md-6">
                        <label for="">Start Day</label>

                    </div>

                 </div>


                 <div class="row form-group justify-content-start">

                    <div class="col-md-6">
                        <input type="text" name="time" class="form-control" id="time" >

                    </div>

                    <div class="col-md-6">
                        <input type="date" name="s_date" class="form-control" id="s_date">

                    </div>

                 </div>



                 <div class="row justify-content-start">
                    <div class="col-md-6">
                        <label for="">Last Date</label>

                    </div>

                    <div class="col-md-6">
                        <label for="">Seat</label>

                    </div>

                 </div>


                 <div class="row form-group justify-content-start">

                    <div class="col-md-6">
                        <input type="date" name="l_date" class="form-control" id="l_date" >

                    </div>

                    <div class="col-md-6">
                        <input type="text" name="seat" class="form-control" id="seat">

                    </div>

                 </div>



                 <div class="row justify-content-center">

                    <button class="btn btn-primary">Submit</button>

                 </div>
            </form>



          ...
        </div>

      </div>
    </div>
  </div>
{{-- Edit Batch --}}

@endsection


@push('js')

<script>
    $(document).ready(function (e)
    {

        $(document).on('click','#addbatch',function()
            {

                event.preventDefault();
                jQuery.noConflict();

                $.ajax({



                      success: function(data)
                       {

                        $("#exampleModal3").modal('show');
                        // $('#tableContent2').html(data.html);

                       }
               });

            });


    });
 </script>



{{-- <script>
    $(document).ready(function ()
    {

        $(document).on('click','.active',function()
            {



                // var id = $(this).val();
                const val=$(this).parent().closest('.date').attr('id');
                 const id = $(this).attr("data-id");

                 alert(id);









                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('batch.delete') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id: val

                        },
                        dataType:'json',


                      success: function(response)
                       {


                        location.reload();




                       }
               });

            });


    });
 </script> --}}



<script>
    $(document).ready(function ()
    {

        $(document).on('click','.delete',function()
            {



                // var id = $(this).val();
                const val=$(this).parent().closest('.date').attr('id');
                 const id = $(this).attr("data-id");









                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('batch.delete') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id: val

                        },
                        dataType:'json',


                      success: function(response)
                       {


                        location.reload();




                       }
               });

            });


    });
 </script>


<script>
    $(document).ready(function ()
    {

        $(document).on('click','.payment',function()
            {





                // var id = $(this).val();
                const val=$(this).parent().closest('.date').attr('id');
                 const id = $(this).attr("data-id");




                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('payment.view') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id: val

                        },
                        dataType:'json',


                      success: function(response)
                       {



                         $('#viewpayment').append(response.html);

                         $("#exampleModal6").modal('show');




                       }
               });

            });


    });
 </script>



<script>

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><select name="day[]"  class="form-control"><option value="">Choose&nbsp;Day</option><option value="Sat">Saturday</option><option value="Sun">Sunday</option><option value="Mon">Monday</option><option value="Tue">Tuesday</option><option value="Wed">Wednesday</option><option value="Thu">Thursday</option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>


<script>
    $(document).ready(function ()
    {

        $(document).on('click','.sms',function()
            {



                // var id = $(this).val();
                const val=$(this).parent().closest('.date').attr('id');
                 const id = $(this).attr("data-id");


                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('send.sms') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id: val

                        },
                        dataType:'json',


                      success: function(message)
                       {

                        $('#send_sms').append(message.html);

                        $("#exampleModal4").modal('show');


                       }
               });

            });


    });
 </script>

{{--

<script>
    $(document).ready(function ()
    {

        const id = $(this).val();
   const courseid = $(this).attr("data-id");

   alert(id);

        $(document).on('click','.sms',function()
            {

                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                      success: function(response)
                       {

                        $("#exampleModal4").modal('show');


                       }
               });

            });


    });
 </script> --}}


 <script>
    $(document).ready(function ()
    {
        $(document).on('click','.edit',function()
            {
                const val=$(this).parent().closest('.date').attr('id');
                 const id = $(this).attr("data-id");



                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                      url : "{{ route('edit.batch') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id: val

                        },
                        dataType:'json',

                      success: function(response)
                       {


                         $("#exampleModal8").modal('show');

                         $('#id').val(response.html.id);
                         $('#batch_number').val(response.html.batch_number);
                         $('#day').val(response.html.day);
                         $('#time').val(response.html.time);
                         $('#s_date').val(response.html.s_date);
                         $('#l_date').val(response.html.l_date);
                         $('#seat').val(response.html.seat);
                         $('#day').val(response.html.day);

                        //  document.getElementById("day").innerHTML = response.html.day;
                        //  document.getElementById("batch_number").innerHTML = response.html.batch_number;
                        // document.getElementById("status").innerHTML = response.status;

                        // document.getElementById("fees").innerHTML = response.fee;



                       }
               });

            });


    });
 </script>


<script>
    $(document).ready(function ()
    {

        $(document).on('click','.active',function()
            {



                // var id = $(this).val();
                const val=$(this).parent().closest('.date').attr('id');
                 const id = $(this).attr("data-id");


                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{url('active.batch') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id: val

                        },
                        dataType:'json',


                      success: function(message)
                       {

                         location.reload();


                       }
               });

            });


    });
 </script>


 <script>
    function myFunction2()
    {
      location.reload();
    }
    </script>

<script>
    $(document).ready( function () {
     $('#myTable2').DataTable();
} );
</script>
@endpush
