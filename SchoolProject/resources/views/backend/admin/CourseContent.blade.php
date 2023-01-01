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
</style>

@section('content')


        <div class="col-md-11">

            <div class="card shadow p-2 mt-2">
                <div class="text-right">

                    @can('add')
                    <a  href="#" id="addCourse" class="btn btn-sm btn-success"><i class="fa fa-plus p-1" aria-hidden="true">&nbsp;AddCourseContent</i></a>

                    @endcan


                </div>



                <div class="card-body">



                    <div class="table-responsive-sm p-0 m-0">


                        <table class="table table-hover table-striped mt-2 w-100" id="myTable">

                            @php
                                $content=App\Models\Coursecontent::get();
                                $i=1;
                            @endphp

                          <thead>

                                  <th>Id</th>
                                  <th>Course&nbsp;Name</th>

                                  <th>Content File</th>
                                  <th>Content&nbsp;Link</th>
                                  <th>Action</th>

                          </thead>

                          <tbody>



                                @foreach ($content as $allcontent)


                                    <tr>
                                        <td>{{$i++}}</td>

                                        @if ($allcontent->course_content)
                                          <td>{{$allcontent->course_content->name}}</td>


                                          @else

                                          <td>N/A</td>

                                        @endif


                                        @if ($allcontent->type=='mp4')
                                            <td>

                                                <iframe src="{{URL::to($allcontent->file)}}" frameborder="0">
                                                </iframe>
                                            </td>

                                          @else

                                            <td>
                                                <a href="{{route('file.download',$allcontent->id)}}" class="btn btn-alt-info"><i class="fas fa-download" style="color: rgb(149, 149, 224);"></i></a>
                                            </td>

                                        @endif


                                        <td>

                                            <a href="{{$allcontent->link}}">View Link</a>

                                        </td>





                                        <td>

                                            <div class="d-flex gap-2">

                                                @can('edit')
                                                    <button type="button" data-toggle="modal" data-target="#exampleModal2" value="{{$allcontent->id}}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i>
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button>

                                                @endcan





                                                  &nbsp;

                                                  @can('delete')

                                                  <a href="{{route('ContentDelete',$allcontent->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Delete</i></a>

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






         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
            Course&nbsp;Content

            </span>


            </h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body border shadow">

            <form method="post" action="{{url('Contentsave')}}" enctype="multipart/form-data">
               @csrf


                               <div class="row justify-content-start">


                                   <div class="col-md-6">
                                       <label>Course&nbsp;Name</label><span class="text-danger">*</span></label>
                                   </div>

                               </div>


                                <div class="row form-group justify-content-start">

                                    @php
                                        $allcourse=App\Models\Course::where('active',1)->get();
                                    @endphp
                                    <div class="col-md-12">

                                        <select name="course_id" id="" class="form-control" required>

                                            @foreach ($allcourse as $courseall)
                                              <option value="{{$courseall->id}}">{{$courseall->name}}</option>

                                            @endforeach


                                        </select>



                                    </div>

                                </div>



                                <div class="row justify-content-start">


                                    <div class="col-md-6">
                                        <label>Content&nbsp;File</label><span class="text-danger"></span></label>
                                    </div>

                                </div>


                                <div class="row form-group justify-content-start">


                                    <div class="col-md-12">
                                        <input type="file" name="file" class="form-control">
                                    </div>

                                    @error('file')
                                           <div class="error" style="color:red;">{{ $message }}</div>
                                     @enderror
                                </div>



                                <div class="row justify-content-start">


                                    <div class="col-md-6">
                                        <label>Content&nbsp;Link</label><span class="text-danger"></span></label>
                                    </div>

                                </div>


                                <div class="row form-group justify-content-start">


                                    <div class="col-md-12">
                                        <input type="text" name="link" class="form-control" placeholder="Content Link">
                                    </div>

                                </div>



                                <div class="row justify-content-center mb-1 mt-4">
                                    <button class="btn btn-primary">Save</button>

                                </div>


            </form>
            ...
            </div>

            </div>
            </div>
            </div>




        {{-- UpdateCoursePayment --}}


        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">
         <span style="color:blueviolet;">
           Update&nbsp;CourseContent

         </span>


         </h5>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body border shadow">

         <form method="post" action="{{url('update.content')}}" enctype="multipart/form-data">
            @csrf

               <input type="hidden" name="id" id="trainerid" value="">
                        <div class="row justify-content-start">


                                <div class="col-md-6">
                                    <label>Course&nbsp;Name</label><span class="text-danger"></span></label>
                                </div>

                        </div>


                        <div class="row form-group justify-content-start">
                            @php
                              $allcourse=App\Models\Course::where('active',1)->get();
                            @endphp


                            <select name="course_id" id="" class="form-control" required>

                                @foreach ($allcourse as $courseall)
                                  <option value="{{$courseall->id}}">{{$courseall->name}}</option>

                                @endforeach


                            </select>

                        </div>


                        <div class="row justify-content-start">


                            <div class="col-md-6">
                                <label>Content&nbsp;File</label><span class="text-danger"></span></label>
                            </div>

                        </div>


                        <div class="row form-group justify-content-start">


                            <div class="col-md-12">
                                <input type="file" name="file" class="form-control">
                            </div>

                            @error('file')
                                   <div class="error" style="color:red;">{{ $message }}</div>
                             @enderror
                        </div>



                        <div class="row justify-content-start">


                            <div class="col-md-6">
                                <label>Content&nbsp;Link</label><span class="text-danger"></span></label>
                            </div>

                        </div>


                        <div class="row form-group justify-content-start">


                            <div class="col-md-12">
                                <input type="text" name="link" id="link" value="" class="form-control" placeholder="Content Link">
                            </div>

                        </div>



                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary">Save</button>

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

       $(document).on('click','#addCourse',function()
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
                 url:"/ContentEdit/"+id,

                    // url:"{{ url('TrainerEdit') }}",
                    // data: {"id": id,"_token": "{{ csrf_token() }}"},

                    // type: 'post',

                     success: function(response)
                      {

                        // $("#exampleModal2").modal('show');
                        // $('#tableContent2').html(data.html); trainerid
                        $('#trainerid').val(response.content.id);
                        $('#name').val(response.content.name);
                        $('#link').val(response.content.link);


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
    function myFunction2()
    {
      location.reload();
    }
    </script>
@endpush
