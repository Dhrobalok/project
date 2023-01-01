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
              <a  href="{{route('add.story')}}" class=" btn-sm btn-primary">Add&nbsp;Story</a>

            @endcan



        </div>





        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100 js-dataTable-full" id="mytable">


                  <thead>

                          <th>Id</th>
                          <th>Name</th>
                          <th>Image</th>

                          <th class="text-center">Action</th>

                  </thead>

                  <tbody>

                    @php
                         $allcourse=App\Models\Story::get();
                        $i=1;
                    @endphp

                       @foreach ($allcourse as $course)

                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{ucwords($course->name)}}</td>





                                <td>

                                    <img src="{{URL::to($course->image)}}" width="100%" alt="">
                                </td>

                                <td>

                                    <div class="text-center gap-2">


                                        {{-- @can('edit') --}}
                                        <a href="{{url('StoryEdit',$course->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i></a>&nbsp;
                                            {{-- <button type="button" data-toggle="modal" data-target="#exampleModal2" value="{{ $course->id }}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i>
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </button> --}}

                                        {{-- @endcan --}}




                                        @can('add')
                                                <a href="{{url('DeleteStory',$course->id)}}" class="btn btn-sm btn-secondary"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Delete</i></a>


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











  {{-- Update Course --}}




 @endsection


