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
</style>

 @section('content')

     <div class="col-md-12">

        <div class="card shadow p-2 mt-2">
            <div class="text-right">

                @can('add')
                  <a  href="#" id="addexam" class="btn btn-sm btn-secondary">Add Exam</a>
                @endcan


                <a  href="{{route('csv.download')}}"  class="btn btn-sm btn-success">CSV Formate</a>

            </div>



            <div class="card-body">



                <div class="table-responsive-sm p-0 m-0">


                    <table class="table table-hover table-striped mt-2 w-100" id="myTable">


                      <thead>


                              <th>Course&nbsp;Name</th>
                              <th>Batch</th>
                              <th>Exam&nbsp;Name</th>
                              <th>Total&nbsp;Mark</th>
                              <th>Date</th>
                              <th>Time</th>
                              <th>View&nbsp;Result</th>
                              <th>Action</th>


                      </thead>

                      <tbody>

                        @php
                            $exam=App\Models\Exam::get();
                        @endphp

                        @foreach ($exam as $examall)

                           <tr>
                              @if ($examall->course_name)

                                <td>
                                    {{$examall->course_name->name}}

                               </td>

                               @else

                               <td>N/A</td>

                              @endif



                              <td>{{ucwords($examall->batch)}}</td>
                              <td>{{ucwords($examall->e_name)}}</td>
                              <td>{{$examall->t_mark}}</td>
                              <td>{{$examall->date}}</td>
                              <td>{{$examall->time}}</td>

                              @if ($examall->active==null)
                                <td><i class="fas fa-times"></i></td>

                                <td>
                                    @can('add')

                                      <a href="#" id="upload"><i class="fas fa-upload"></i></a>

                                    @endcan


                                </td>

                                @else

                                <td>
                                    @can('view')
                                    <a href="#" id="view" data-id="{{$examall->id}}"><i class="fas fa-eye"></i>

                                    </a>

                                    @endcan
                                </td>

                                <td><span style="color: rgb(61, 57, 57);">Result&nbsp;Publish</span></td>

                              @endif

                              {{-- <td><a href="#"><i class="fas fa-pen"></i></a></td> --}}





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
                Add&nbsp;Exam

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('Exam.Add')}}" enctype="multipart/form-data">
                    @csrf





                            <div class="row justify-content-start">


                                <div class="col-md-6">
                                    <label>Course</label><span class="text-danger"></span></label>
                                </div>


                                <div class="col-md-6">
                                    <label>Batch&nbsp;Number</label><span class="text-danger"></span></label>
                                </div>

                            </div>

                        <div class="row form-group justify-content-start">
                             @php
                                 $allcourse=App\Models\Course::where('active',1)->get();
                             @endphp

                            <div class="col-md-6">

                                <select name="course" id="type" class="form-control">

                                    <option value="">Choose Course</option>
                                    @foreach ($allcourse as $course)

                                       <option value="{{$course->id}}">{{$course->name}}</option>

                                    @endforeach
                                </select>



                            </div>


                            <div class="col-md-6">
                                <select name="bnumber" id="b_number" class="form-control number" required>

                                    <option value="">Select Batch</option>



                                </select>


                             </div>

                        </div>



                            <div class="row justify-content-start">


                                <div class="col-md-6">
                                    <label>Exam&nbsp;Name</label><span class="text-danger"></span></label>
                                </div>

                                <div class="col-md-6">
                                    <label>Exam&nbsp;date</label><span class="text-danger"></span></label>
                                </div>

                            </div>

                        <div class="row form-group justify-content-start">



                            <div class="col-md-6">

                                  <input type="text" name="e_name" class="form-control" placeholder="Exam Name">

                            </div>

                            <div class="col-md-6">

                                <input type="date" name="e_date" class="form-control" placeholder="Exam Date">

                          </div>

                        </div>






                        <div class="row justify-content-start">


                            <div class="col-md-6">
                                <label>Total Mark</label><span class="text-danger"></span></label>
                            </div>

                            <div class="col-md-6">
                                <label>Time</label><span class="text-danger"></span></label>
                            </div>

                        </div>


                        <div class="row form-group justify-content-start">



                            <div class="col-md-6">

                                  <input type="text" name="t_mark" class="form-control" placeholder="Total Mark">

                            </div>

                            <div class="col-md-6">

                                <input type="time" name="time" class="form-control" placeholder="Exam Time">

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




  {{-- upload result --}}


  <div class="modal fade" id="exampleModal2"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Upload&nbsp;Result

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('Upload.result')}}" enctype="multipart/form-data">
                    @csrf



                    <div class="row justify-content-start">


                        <div class="col-md-6">
                            <label>Course</label><span class="text-danger"></span></label>
                        </div>


                        <div class="col-md-6">
                            <label>Batch&nbsp;Number</label><span class="text-danger"></span></label>
                        </div>

                    </div>

                <div class="row form-group justify-content-start">
                     @php
                         $allcourse=App\Models\Course::where('active',1)->get();
                     @endphp

                    <div class="col-md-6">

                        <select name="course" id="type_id" class="form-control">

                            <option value="">Choose Course</option>
                            @foreach ($allcourse as $course)

                               <option value="{{$course->id}}">{{$course->name}}</option>

                            @endforeach
                        </select>



                    </div>


                    <div class="col-md-6">
                        <select name="bnumber" id="b_number2" class="form-control number" required>

                            <option value="">Select Batch</option>



                        </select>


                     </div>

                </div>


                      <div class="row justify-content-start">

                           <div class="col-md-6">
                               <label for="">Upload Result</label>

                           </div>

                      </div>


                      <div class="row form-group justify-content-start">

                          <div class="col-md-12">
                               <input type="file" name="file" class="form-control">

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


{{-- View Result --}}

  <div class="modal fade" id="exampleModal3"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Student&nbsp;Result

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <div id="result_details">

                 </div>
        </div>

      </div>
    </div>
  </div>



 @endsection

 @push('js')

 <script>
    $(document).ready(function (e)
    {

        $(document).on('click','#addexam',function()
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

        $(document).on('click','#upload',function()
            {

                event.preventDefault();
                jQuery.noConflict();

                $.ajax({



                      success: function(data)
                       {

                        $("#exampleModal2").modal('show');
                        // $('#tableContent2').html(data.html);

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
    $('#type_id').on('change',function()
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

                            $('#b_number2').html(htmloption);







                      }
              });

           });

</script>



<script>
    $(document).ready(function (e)
    {

        $(document).on('click','#view',function()
            {


                const id = $(this).attr("data-id");





                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                    type:"get",
                   url:"/view.result/"+id,



                      success: function(data)
                       {



                          $('#result_details').append(data.html);

                          $("#exampleModal3").modal('show');

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

 @endpush
