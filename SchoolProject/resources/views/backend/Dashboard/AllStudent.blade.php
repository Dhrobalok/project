@extends('backend.Dashboard.AdminDashUser')




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
    .form-control
    {
        display: block;
        width:100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }


    #myTable2 th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 22px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }

    #myTable2 td
    {
        color:rgb(25, 19, 19);
    font-size:15px;
    line-height: 20px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;

    }


    #myTable3 th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 8px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }

    #myTable3 td
    {
        color:rgb(25, 19, 19);
    font-size:15px;
    line-height: 20px;
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

.select2-container--default .select2-search--inline .select2-search__field

{
    background: transparent;
    /* background-color: #081824 !important; */

    outline: 0;
    outline-color: initial;
    outline-style: initial;
    outline-width: 100px !important;
    box-shadow: none;
    -webkit-appearance: textfield;
    width:220px!important;
    /* border: 1px solid rgb(83, 74, 74) !important;
    color: black!important; */
}

.select2-container--default  .select2-selection__choice {
    background-color: #8d6d6d !important;
    border: 1px solid rgb(53, 47, 47)!important;
    border-radius: 4px;
    width: 220px!important;

}

.select2-container--default  .select2-selection__rendered li:first-child.select2-search.select2-search--inline .select2-search__field {
    width: 120%!important;
}

}

#list
{
    width: 350px !important;
}

#exampleModal6
{
    width: 120% !important;
}

#exampleModal8
{
    width: 120% !important;
}

#model-content2
{

    position: relative;
    display: -ms-flexbox;
    display: middle !important;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 820px!important;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 0.3rem;
    box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 50%);
    outline: 0;

}

</style>

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        @if( Session::has("msg") )
        <script>
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get("msg") }}',

            })

        </script>

        @endif

<div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">


        </div>



        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100" id="myTable">


                  <thead>

                          <th>Id</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Status</th>
                          <th>Action</th>

                  </thead>

                  <tbody>

                    @php
                         $allcourse=App\Models\User::
                         Where('status','!=',2)
                         ->where('status','!=',3)
                         ->where('status','!=',4)
                         ->get();
                        $i=1;
                    @endphp

                       @foreach ($allcourse as $course)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ucwords($course->name)}}</td>
                                <td>{{$course->email}}</td>
                                <td>{{$course->p_no}}</td>
{{--
                                @php

                                    $allday=Batch::where('user_id',$course->id)
                                    ->first();

                                 @endphp --}}



                                 @if ($course->status==1)
                                   <td><span style="color:#495057">Active</span></td>

                                   @else

                                   <td><span style="color:red">Inactive</span></td>


                                 @endif




                                <td>

                                    <div class="d-flex gap-1 assignbatch" id={{$course->id}}>

                                        @can('view')

                                        <a type="button" data-id="{{ $course->id }}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-eye" style="font-size: 12px;padding:2px;">&nbsp;Details</i>
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        @endcan



                                        {{-- <a type="button" data-id="{{ $course->id }}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-eye" style="font-size: 12px;padding:2px;">&nbsp;Enroll&nbsp;Course</i>
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                          &nbsp;
                                        <a type="button" data-id="{{ $course->id }}" class="btn btn-success btn-xs assign" style="margin-right:5px;"><i class="fas fa-tasks" style="font-size: 12px;padding:2px;">&nbsp;Assign&nbsp;Batch</i>
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        {{-- <a href="{{url('Edit',$course->id)}}"  class="btn btn-sm btn-primary"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i></a>
                                        &nbsp;
                                        <a href="{{route('Active.student',$course->id)}}" class="btn btn-sm btn-secondary"><i class="fas fa-check" style="font-size: 12px;padding:2px;">&nbsp;Active</i></a>
                                        &nbsp;&nbsp;
                                      <a href="{{route('student.Delete',$course->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Inactive</i></a> --}}

                                    </div>
                                </td>


                            </tr>

                       @endforeach


                  </tbody>

                </table>

            </div>


        </div>

    </div>


 </div>






 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
    <div class="modal-content" id="model-content2">
    <div class="modal-header">
        <center><h4 style="color:red">Course</h4></center>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">

         <div class="table-responsive" id="viewPayment">

         </div>








    ...
    </div>

    </div>
    </div>
    </div>




    {{-- Assign time --}}

    <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <center><h4 style="color:red">Batch Time</h4></center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body border shadow">

                <div id="Assigntime">

                </div>
       ...
        </div>

        </div>
        </div>
        </div>



         {{-- Special Discount --}}

    <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <center><h4 style="color:red">Special Discount</h4></center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body border shadow">

            <form action="{{route('specialDiscount.save')}}" method="post">

                @csrf

                <div id="special">

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




         {{-- Assign Batch Update --}}

    <div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <center><h4 style="color:red"> User Time Update</h4></center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body border shadow">

            <form action="{{route('batchtime.update')}}" method="post">

                @csrf



               <input type="hidden" name="userid" id="user_id">
               <input type="hidden" name="courseid" id="course_id">
                <div class="row justify-content-center">

                    <div class="col-md-6">

                        <label for="">Choose Time</label>

                    </div>



                </div>


                <div class="row form-group justify-content-center">

                    <div class="col-md-6">

                              <input type="radio" onchange="changeTime('entertime')"  name="entertime">&nbsp;Enter&nbsp;Time
                              <input type="radio" onchange="changeTime('choosetime')" name="entertime" >&nbsp;Choose&nbsp;Time

                        <div class="timeadd" id="entertime" style="display: none;">
                            <input type="text"  class="form-control" name="entertime" placeholder="Enter Time">

                        </div>

                        <div class="timeadd" id="choosetime" style="display: none;">


                            <select name="choosetime" id="select_time" class="form-control" >

                                <option value="">Choose Time</option>

                            </select>
                        </div>



                    </div>



                </div>




                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <label for="">Choose Day</label>

                    </div>

                </div>



                <div class="row form-group justify-content-center">



                    <div class="col-md-6">



                               <input type="radio" onchange="changeDay('enterday')"  name="enterday" class="enterday">&nbsp;Enter&nbsp;Day
                              <input type="radio" onchange="changeDay('chooseday')" name="enterday"  class="enterday">&nbsp;Choose&nbsp;Day



                       <div class="dayinput" id="enterday" style="display: none;">
                                        <input type="checkbox" class="days" name='day[]' value="Sat"/>Sat
                                        <input type="checkbox" class="days" name='day[]' value="Sun"/>Sun
                                        <input type="checkbox" class="days" name='day[]' value="Mon"/>Mon
                                        <input type="checkbox" class="days" name='day[]' value="Tues"/>Tues
                                        <input type="checkbox" class="days" name='day[]' value="Wed"/>Wed
                                        <input type="checkbox" class="days" name='day[]' value="Thur"/>Thur
                                        <input type="checkbox" class="days" name='day[]' value="Fri"/>Fri

                       </div>


                       <div class="dayinput"  id="chooseday" style="display: none;">
                            <select name="chooseday" id="select_day" class="form-control" >

                                  <option value="">Choose Day</option>
                           </select>

                       </div>



                    </div>

                </div>


                <div class="row justify-content-center mt-4">

                    <button class="btn btn-primary">Submit</button>

               </div>

            </form>



        ...
        </div>

        </div>
        </div>
        </div>


@endsection


@push('js')

<script>
    $(document).ready(function (e)
    {

        $(document).on('click','.editbtn',function()
            {

             
                const id = $(this).attr("data-id");
                var v='{{asset('/')}}';
                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                 type:"get",
                  url:"/viewstudent/"+id,

                     // url:"{{ url('TrainerEdit') }}",
                     // data: {"id": id,"_token": "{{ csrf_token() }}"},

                     // type: 'post',

                      success: function(data)
                       {

                        $('#viewPayment').append(data.html);


                        $("#exampleModal2").modal('show');



                        // var image=v+''+response.users.image;



                        // document.getElementById("course_enroll").innerHTML = response.courseall;
                        // document.getElementById("status").innerHTML = response.status;

                        // document.getElementById("fees").innerHTML = response.fee;



                         // $("#exampleModal2").modal('show');dob
                         // $('#tableContent2').html(data.html); trainerid


                        //  $('#f_name').val(response.users.f_name);
                        //  $('#m_name').val(response.users.m_name);
                        //  $('#dob').val(response.users.dob);
                        //  $('#gender').val(response.users.gender);

                        //  $('#qualification').val(response.users.a_qualification);
                        //  $('#institute').val(response.users.institute);
                        //  $('#e_no').val(response.users.e_no);
                        //  $('#p_no').val(response.users.p_no);


                       }
               });

            });


    });
 </script>

<script>
    $(document).ready(function ()
    {

        $(document).on('click','.discount',function()
            {



                // var id = $(this).val();
                const id=$(this).parent().closest('.date').attr('id');
                 const c_id = $(this).attr("data-id");



                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('discount.set') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id: c_id

                        },
                        dataType:'json',


                      success: function(response)
                       {

                        //    location.reload();


                       }
               });

            });


    });
 </script>


<script>
    $(document).ready(function ()
    {

        $(document).on('click','.special',function()
            {



                // var id = $(this).val();
                const id=$(this).parent().closest('.date').attr('id');
                 const c_id = $(this).attr("data-id");



                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('Special.discount') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id: c_id

                        },
                        dataType:'json',


                      success: function(response)
                       {

                        $('#special').append(response.html);

                        $("#exampleModal7").modal('show');




                       }
               });

            });


    });
 </script>

<script>
    // changePaymenttype('installment')

    function  changeDay(type)
    {

        $(".dayinput").hide();
        $("#"+type).show();



    }


 </script>

<script>
    // changePaymenttype('installment')

    function  changeTime(type)
    {

        $(".timeadd").hide();
        $("#"+type).show();



    }


 </script>


<script>
    function myFunction2()
    {
      location.reload();
    }
    </script>




<script>
    $(document).ready(function ()
    {

        $(document).on('click','.assign',function()
            {



                // var id = $(this).val();
                const id=$(this).parent().closest('.batchass').attr('id');
                 const c_id = $(this).attr("data-id");

                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('batchassign') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id:c_id,


                        },
                        dataType:'json',


                      success: function(response)
                       {

                          $('#Assigntime').append(response.html);

                          $("#exampleModal6").modal('show');


                       }
               });

            });


    });
 </script>


<script>
    $(document).ready(function ()
    {

        $(document).on('click','.assignConfirm',function()
            {



                const c_id=$(this).parent().closest('.assignbatch').attr('id');

                 const id = $(this).attr("data-id");





                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('batchCofirm') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id:c_id,


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

        $(document).on('click','.editBatch',function()
            {



                const c_id=$(this).parent().closest('.batchass').attr('id');

                 const id = $(this).attr("data-id");





                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ url('edit.assignBatch') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            c_id:c_id,


                        },
                        dataType:'json',


                      success: function(res)
                       {



                        // $('#assignupdate').append(response.html);

                          $("#exampleModal8").modal('show');


                           var htmloption="";

                           $.each(res,function()
                              {
                                       $.each(this,function(k,v)
                                       {

                                           htmloption+="<option  value='"+v.day+"'>"+v.day+"</option>";
                                       })
                               })


                               var htmloption2="";
                           $.each(res,function()
                              {
                                       $.each(this,function(k,v)
                                       {
                                           htmloption2+="<option  value='"+v.time+"'>"+v.time+"</option>";
                                       })
                               })

                               $('#select_day').append(htmloption);

                            //    $('#select_day').html(htmloption);
                            //    $('#select_time').html(htmloption2);

                               $('#select_time').append(htmloption2);

                               $('#user_id').val(res.userid);
                               $('#course_id').val(res.course_id);
                         }
               });

            });


    });
 </script>


<script>
$(document).ready(function ()
       {
            $('.select2').select2
            ({
                tags: true
            });
        });
</script>

{{-- <script>

$(document).ready(function() {
    $('.select2').select2();
    tags: true
})

    </script> --}}



@endpush



