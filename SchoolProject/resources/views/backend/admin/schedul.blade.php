@extends('backend.Dashboard.AdminDashUser')
<style>
    #mytable th
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

/* .table-responsive
{
    overflow-x: hidden !important;
} */

#myTable_filter
{
    float: right !important;
}


    .select2-container--default
    .select2-selection--multiple
    .select2-selection__choice
     {
    background-color: #081824 !important;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
    /* z-index: 9999 !important; */
}

#list
{
    width: 350px !important;
}
</style>

@section('content')


        @if (session('msg'))
            <div>
               <script>
                alert('Another Schedule is Alocated in this time')
               </script>
            </div>
        @endif

<div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">

            @can('add')
              <a  href="#" id="addSchedule" class="btn btn-sm btn-success"><i class="fa fa-plus p-1" aria-hidden="true">&nbsp;AddSchedule</i></a>

            @endcan


        </div>



        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100 js-dataTable-full" id="mytable">


                  <thead>

                          <th>Id</th>
                          <th>Course</th>
                          <th>Batch</th>
                          <th>Trainer</th>
                          <th>Action</th>

                  </thead>

                  <tbody>

                    @php
                         $allcourse=App\Models\Schedule::get();
                        $i=1;
                    @endphp

                       @foreach ($allcourse as $course)

                            <tr>
                                <td>{{$i++}}</td>


                                @if ($course->course_name)
                                <td>{{$course->course_name->name}}</td>

                               @else
                             <td>N/A</td>

                              @endif

                              <td>{{$course->batch}}</td>



                                @if ($course->trainer_name)
                                  <td>{{$course->trainer_name->name}}</td>

                                 @else
                               <td>N/A</td>

                                @endif


                                <td>

                                    <div class="d-flex gap-1">
                                        {{-- <button type="button" data-toggle="modal" data-target="#exampleModal2" value="{{ $course->id }}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i>
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button> --}}

                                        {{-- <a href="{{url('Edit',$course->id)}}"  class="btn btn-sm btn-primary"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i></a> --}}
                                        &nbsp;
                                        @can('delete')
                                        <a href="{{route('Schedule.Delete',$course->id)}}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Delete</i></a>

                                        @endcan


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



 {{-- Add Schedule --}}


 <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Add&nbsp;Schedule

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('Schedul.Add')}}" enctype="multipart/form-data">
                    @csrf





                            <div class="row justify-content-start">


                                <div class="col-md-6">
                                    <label>Course</label><span class="text-danger"></span></label>
                                </div>

                            </div>

                        <div class="row form-group justify-content-start">
                             @php
                                 $allcourse=App\Models\Course::where('active',1)->get();
                             @endphp

                            <div class="col-md-12">

                                <select name="course" id="type" class="form-control">

                                    <option value="">Choose Course</option>
                                    @foreach ($allcourse as $course)

                                       <option value="{{$course->id}}">{{$course->name}}</option>

                                    @endforeach
                                </select>



                            </div>

                        </div>


                        <div class="row justify-content-start">


                            <div class="col-md-6">
                                <label>Batch&nbsp;Number</label><span class="text-danger"></span></label>
                            </div>



                        </div>


                        <div class="row form-group justify-content-start">



                       <div class="col-md-12">
                                <select name="bnumber" id="b_number" class="form-control number" required>

                                    <option value="">Select Batch</option>



                                </select>


                       </div>




                   </div>


                            <div class="row justify-content-start">


                                <div class="col-md-6">
                                    <label>Trainer</label><span class="text-danger"></span></label>
                                </div>

                            </div>

                        <div class="row form-group justify-content-start">

                            @php
                                $alltrainer=App\Models\User::where('status',3)->get();
                            @endphp

                            <div class="col-md-12">

                                  <select name="trainer_id" id="" class="form-control">

                                    <option value="">Choose Trainer</option>

                                    @foreach ($alltrainer as $trainer)
                                      <option value="{{$trainer->id}}">{{$trainer->name}}</option>

                                    @endforeach
                                  </select>

                            </div>

                        </div>







                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary">Course&nbsp;Save</button>

                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>
  </div>


  {{-- Update Schedule --}}


<div class="modal fade" id="exampleModal2" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
    <span style="color:blueviolet;">
      Edit&nbsp;Schedule

    </span>


    </h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body border shadow">

    <form method="post" action="{{url('update.schedule')}}" enctype="multipart/form-data">
       @csrf

          <input type="hidden" name="id" id="scheduleid" value="">

          <div class="row justify-content-start">


            <div class="col-md-6">
                <label>Day</label><span class="text-danger"></span></label>
            </div>

        </div>

    <div class="row form-group justify-content-start">

        <div class="col-md-12">

            <select name="day" id="day" value="" class="form-control">
                <option value="">Choose Day</option>
                <option value="Sat">Saturday</option>
                <option value="Sun">Sunday</option>
                <option value="Mon">Monday</option>
                <option value="Tue">Tuesday</option>
                <option value="Wed">Wednesday</option>
                <option value="Thu">Thursday</option>


            </select>

        </div>

    </div>



    <div class="row justify-content-start">


        <div class="col-md-6">
            <label>Duration</label><span class="text-danger"></span></label>
        </div>

    </div>

<div class="row form-group justify-content-start">

    <div class="col-md-12">

        <input type="text" name="duration" id="duration" value=""  class="form-control">

    </div>

</div>



<div class="row justify-content-start">


    <div class="col-md-6">
        <label>Course</label><span class="text-danger"></span></label>
    </div>

</div>

<div class="row form-group justify-content-start">
 @php
     $allcourse=App\Models\Course::get();
 @endphp

<div class="col-md-12">

    <select name="course" id="course_id" value="" class="form-control">

        <option value="">Choose Course</option>
        @foreach ($allcourse as $course)

           <option value="{{$course->id}}">{{$course->name}}</option>

        @endforeach
    </select>



</div>

</div>



<div class="row justify-content-start">


    <div class="col-md-6">
        <label>Trainer</label><span class="text-danger"></span></label>
    </div>

</div>

<div class="row form-group justify-content-start">

@php
    $alltrainer=App\Models\User::where('status',3)->get();
@endphp

<div class="col-md-12">

      <select name="trainer_id" id="trainer_id" value="" class="form-control">

        <option value="">Choose Trainer</option>

        @foreach ($alltrainer as $trainer)
          <option value="{{$trainer->id}}">{{$trainer->name}}</option>

        @endforeach
      </select>

</div>

</div>







<div class="row justify-content-center mb-1 mt-4">
<button class="btn btn-primary">Course&nbsp;Save</button>

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

        $(document).on('click','#addSchedule',function()
            {

                event.preventDefault();
                jQuery.noConflict();

                $.ajax({



                      success: function(data)
                       {

                        $("#exampleModal").modal('show');
                        // $('#tableContent2').html(data.html);

                       }
               });

            });


    });
 </script>


<script>
    $(document).ready(function (e)
    {

        $(document).on('click','.editbtn',function()
            {



                var id = $(this).val();





                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                 type:"get",
                  url:"/ScheduleEdit/"+id,

                     // url:"{{ url('TrainerEdit') }}",
                     // data: {"id": id,"_token": "{{ csrf_token() }}"},

                     // type: 'post',

                      success: function(response)
                       {

                         // $("#exampleModal2").modal('show');
                         // $('#tableContent2').html(data.html); trainerid
                         $('#scheduleid').val(response.schedules.id);
                         $('#day').val(response.schedules.day);
                         $('#course_id').val(response.schedules.course_id);
                         $('#duration').val(response.schedules.duration);
                         $('#trainer_id').val(response.schedules.trainer_id);


                         Swal.fire({
                   icon: 'success',
                   title: 'Success.',
                   text: response
                 });



                       }
               });

            });


    });
 </script>












<script>
    $('#type').on('change',function()
           {



               const id = $(this).val();



               $.ajax({

                   type:"get",
                   url:"/enrollCourse.id/"+id,

                     success: function(res)
                      {



                          var htmloption="<option value=''>Please Select Option</option>";
                           $.each(res,function()
                              {
                                       $.each(this,function(k,v)
                                       {
                                           htmloption+="<option  value='"+v.batch_number+"'>Batch Number "+v.batch_number+"</option>";
                                       })
                               })

                            $('#b_number').html(htmloption);







                      }
              });

           });

</script>


<script>
    function myFunction2()
    {
      location.reload();
    }
    </script>

@endpush
