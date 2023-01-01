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


        @php
          $discount=App\Models\Specialdiscount::get();
          $i=1;
        @endphp

<div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">

            @can('add')
            <a  href="#" id="adddiscount" class="btn btn-sm btn-success">&nbsp;Course&nbsp;Discount</a>

            @endcan


        </div>



        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100" id="myTable">



                  <thead>

                          <th>Id</th>
                          <th>Course&nbsp;Name</th>

                          <th>Discount %</th>

                          <th>Action</th>

                  </thead>

                  <tbody>



                        @foreach ($discount as $allcontent)


                            <tr>
                                <td>{{$i++}}</td>

                                @if ($allcontent->discount_name)
                                  <td>{{$allcontent->discount_name->name}}</td>


                                  @else

                                  <td>N/A</td>

                                @endif


                                <td>
                                    {{ $allcontent->discount}}%
                                </td>

                                <td>

                                    @can('edit')
                                    <a  href="javascript:void(0);" data-id="{{$allcontent->id}}" class="btn btn-sm btn-secondary edit">

                                        <i class="fas fa-edit"></i>
                                     </a>

                                    @endcan



                                    @can('delete')
                                        <a  href="javascript:void(0);" data-id="{{$allcontent->id}}" class="btn btn-sm btn-success delete">

                                            <i class="fas fa-times"></i>
                                        </a>

                                    @endcan


                                </td>


                            </tr>
                     @endforeach




                  </tbody>

                </table>

            </div>


        </div>

    </div>


 </div>




 {{-- Course Discount --}}
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Add&nbsp;Course&nbsp;Discount

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('discount.save')}}" enctype="multipart/form-data">
                    @csrf


                                    <div class="row justify-content-start">


                                        <div class="col-md-6">
                                            <label>Course&nbsp;Name</label><span class="text-danger"></span></label>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Course&nbsp;Discount</label><span class="text-danger"></span></label>
                                        </div>



                                    </div>

                                <div class="row form-group justify-content-start">

                                    <div class="col-md-6">

                                        @php
                                            $allcourse=App\Models\Course::where('active',1)->get();
                                        @endphp

                                        <select name="course_id" id="" class="form-control">
                                            <option value="">Choose Chorse</option>

                                            @foreach ( $allcourse as  $course)
                                               <option value="{{$course->id}}">{{$course->name}}</option>

                                            @endforeach


                                        </select>



                                    </div>

                                    <div class="col-md-6">

                                        <input type="text" name="discount" id="" placeholder="Course Discount" class="form-control">

                                    </div>

                                </div>


                               



                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary">Discount&nbsp;Save</button>

                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>
  </div>




  {{--Edit Course Discount --}}
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Edit&nbsp;Course&nbsp;Discount

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('discount.update')}}" enctype="multipart/form-data">
                    @csrf


                               <div id="viewdiscount">
                                </div>


                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary">Discount&nbsp;Update</button>

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

        $(document).on('click','#adddiscount',function()
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

        $(document).on('click','.edit',function()
            {

                const id = $(this).attr("data-id");



                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                    type:"get",
                  url:"/Edit.discount/"+id,


                      success: function(data)
                       {

                        $('#viewdiscount').append(data.html);

                        $("#exampleModal2").modal('show');

                       }
               });

            });


    });
 </script>


<script>
    $(document).ready(function (e)
    {

        $(document).on('click','.delete',function()
            {

                const id = $(this).attr("data-id");



                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                    type:"get",
                    url:"/delete.discount/"+id,


                      success: function(data)
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



@endpush
