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


@if( Session::has("msg") )
<script>
    Swal.fire({
    icon: 'success',
    title: 'Course Saved !',

    })

</script>
@endif

<div class="col-md-11">

<div class="card shadow p-2 mt-2">
<div class="text-right">
    @can('add')
    <a  href="#" id="addCourse" class="btn btn-sm btn-success"><i class="fa fa-plus p-1" aria-hidden="true">Add&nbsp;CourseCategory</i></a>

    @endcan


</div>



<div class="card-body">



<div class="table-responsive-sm p-0 m-0">


<table class="table table-hover table-striped mt-2 w-100" id="myTable">


<thead>

      <th>Id</th>
      <th>CategoryName</th>

      <th>Action</th>

</thead>

<tbody>

@php
    $i=1;
@endphp

   @foreach ($coursecategory as $category)

        <tr>
            <td>{{$i++}}</td>


            <td>{{ucwords($category->name)}}</td>



            <td>

                <div class="d-flex gap-1">

                    @can('edit')
                        <button type="button" data-toggle="modal" data-target="#exampleModal2" value="{{ $category->id }}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i>
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>

                    @endcan


                    {{-- <a id="PaymentEdit"  data-toggle="modal" data-target="#exampleModal2" value={{$trainer->id}}  class="btn btn-sm btn-primary"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i></a> --}}
                    &nbsp;

                    @can('delete')
                       <a href="{{url('categoryDelete',$category->id)}}" class="btn btn-success btn-xs p-1" onclick="return confirm('Are you sure?')"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Delete</i></a>


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
    Course&nbsp;Category

    </span>


    </h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body border shadow">

    <form method="post" action="{{url('Categorysave')}}" enctype="multipart/form-data">
       @csrf


                       <div class="row justify-content-start">


                           <div class="col-md-6">
                               <label>Category&nbsp;Name</label><span class="text-danger"></span></label>
                           </div>

                       </div>


                        <div class="row form-group justify-content-start">


                            <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" placeholder="CourseCategory">


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
   Update&nbsp;CourseCategory

 </span>


 </h5>

 <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
 <span aria-hidden="true">&times;</span>
 </button>
 </div>
 <div class="modal-body border shadow">

 <form method="post" action="{{url('update.category')}}" enctype="multipart/form-data">
    @csrf

       <input type="hidden" name="id" id="trainerid" value="">
                <div class="row justify-content-start">


                        <div class="col-md-6">
                            <label>Category&nbsp;Name</label><span class="text-danger"></span></label>
                        </div>

                </div>


                <div class="row form-group justify-content-start">


                    <div class="col-md-12">
                            <input type="text" name="name" id="name" value="" class="form-control" placeholder="CategoryName">


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








{{--  --}}

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
                 url:"/CategoryEdit/"+id,

                    // url:"{{ url('TrainerEdit') }}",
                    // data: {"id": id,"_token": "{{ csrf_token() }}"},

                    // type: 'post',

                     success: function(response)
                      {

                        // $("#exampleModal2").modal('show');
                        // $('#tableContent2').html(data.html); trainerid
                        $('#trainerid').val(response.categores.id);
                        $('#name').val(response.categores.name);


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
