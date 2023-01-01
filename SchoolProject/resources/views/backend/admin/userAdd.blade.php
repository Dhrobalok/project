@extends('backend.Dashboard.AdminDashUser')

@section('css')
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

/* .table-responsive
{
    overflow-x: hidden !important;
} */

#mytable_filter
{
    float: right !important;
}

#list
{
    width: 340px !important;
}
</style>
@endsection

 @section('content')

 @if (session('msg'))
 <div>
 <script>
     alert('Another Batch Is alocated at the time')
 </script>
 </div>
 @endif

    @if($errors->has('image'))

       <script>
           alert('The image may not be greater than 1024 kilobytes. ')
       </script>

        {{-- <div class="error">{{ $message }}</div> --}}
    @endif

 <div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">

            @can('add')
              <a  href="#" id="adduser" class=" btn-sm btn-primary">AddUser</i></a>

            @endcan



        </div>





        <div class="card-body">

                        @if (\Session::has('alrt'))
                        <div>
                            <ul>
                                <li>{!! \Session::get('alrt') !!} <a href="{{route('addbatch')}}"><i class="fas fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                  @endif

            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100 js-dataTable-full" id="mytable">


                  <thead>

                          <th>Id</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Image</th>

                          <th>Action</th>

                  </thead>

                  <tbody>

                    @php
                         $allUser=App\Models\User::where('status',2)->get();
                        $i=1;
                    @endphp

                       @foreach ($allUser as $course)

                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{ucwords($course->name)}}</td>

                                <td>{{$course->email}}</td>




                                <td>

                                    <img src="{{URL::to($course->image)}}" width="100%" alt="">
                                </td>


                                <td>

                                    <div class="d-flex">



                                        @can('delete')
                                                <a href="{{url('User.delete',$course->id)}}" class="btn-sm btn-danger p-1 m-0"><i class="fas fa-times"></i> Delete</a>



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





 {{-- modal --}}

 <div class="modal" tabindex="-1" role="dialog" id="userModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <form action="{{route('User.save')}}" method="post" enctype="multipart/form-data">
                    @csrf

                         <div class="row justify-content-start">

                              <div class="col-md-6">
                                 <label for="">Name*</label>

                              </div>

                         </div>


                         <div class="row form-group justify-content-start">

                              <div class="col-md-12">

                                  <input type="text" name="name" class="form-control" placeholder="Enter Name" required>

                              </div>

                         </div>


                         <div class="row justify-content-start">

                            <div class="col-md-6">
                               <label for="">Email*</label>

                            </div>

                       </div>


                       <div class="row form-group justify-content-start">

                            <div class="col-md-12">

                                <input type="email" name="email" class="form-control" placeholder="Enter Eamil" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                            </div>

                       </div>


                       <div class="row justify-content-start">

                        <div class="col-md-6">
                           <label for="">Image*</label>

                        </div>

                   </div>


                   <div class="row form-group justify-content-start">

                        <div class="col-md-12">

                            <input type="file" name="image" class="form-control" placeholder="Enter Eamil" required>

                        </div>

                   </div>


                   <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">User&nbsp;Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>

                 </form>

        </div>

      </div>
    </div>
  </div>

 @endsection

 @push('js')


 <script>
    $(document).ready(function (e)
    {

        $(document).on('click','#adduser',function()
            {

                event.preventDefault();
                jQuery.noConflict();

                $.ajax({



                      success: function(data)
                       {

                        $("#userModal").modal('show');
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
                  url:"/CourseEdit/"+id,

                     // url:"{{ url('TrainerEdit') }}",
                     // data: {"id": id,"_token": "{{ csrf_token() }}"},

                     // type: 'post',

                      success: function(response)
                       {

                         // $("#exampleModal2").modal('show');
                         // $('#tableContent2').html(data.html); trainerid
                         $('#courseid').val(response.course.id);
                         $('#course').val(response.course.name);
                         $('#description').val(response.course.description);
                         $('#fees').val(response.course.fees);
                         $('#category').val(response.course.category_id);
                         $('#duration').val(response.course.duration);
                         $('#s_day').val(response.course.s_day);
                         $('#l_day').val(response.course.l_day);

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
    function myFunction2()
    {
      location.reload();
    }
    </script>

 @endpush

