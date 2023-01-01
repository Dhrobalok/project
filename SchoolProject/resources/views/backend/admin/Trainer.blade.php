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
      <a  href="#" id="addCourse" class="btn btn-sm btn-success"><i class="fa fa-plus p-1" aria-hidden="true">Add&nbsp;Trainer</i></a>


    @endcan

</div>



<div class="card-body">



<div class="table-responsive-xs p-0 m-0">


<table class="table table-hover table-striped mt-2 w-100" id="myTable">


<thead>

      <th>Id</th>
      <th>Trainer&nbsp;Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Image</th>


      <th>Action</th>

</thead>

<tbody>

@php
     $alltrainer=App\Models\User::where('status',3)->get();
    $i=1;
@endphp

   @foreach ($alltrainer as $trainer)

        <tr>
            <td>{{$i++}}</td>


            <td>{{$trainer->name}}</td>
            <td>{{$trainer->email}}</td>

            <td>{{$trainer->p_no}}</td>
            <td>
                <img src="{{URL::to($trainer->image)}}" width="80" height="80" alt="">
            </td>

            <td>

                <div class="d-flex gap-1">

                    @can('edit')
                        <button type="button" data-toggle="modal" data-target="#exampleModal2" value="{{ $trainer->id }}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i>
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>

                    @endcan


                    {{-- <a id="PaymentEdit"  data-toggle="modal" data-target="#exampleModal2" value={{$trainer->id}}  class="btn btn-sm btn-primary"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i></a> --}}
                    &nbsp;
                    @can('delete')
                     <a href="{{url('trainerDelete',$trainer->id)}}" class="btn btn-success btn-xs p-1" onclick="return confirm('Are you sure?')"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Delete</i></a>

                    @endcan


                    &nbsp;
                    <a  href="#" id="remainder" data-id="{{$trainer->id}}" class="btn btn-sm btn-Secondary"><i class="fas fa-bell" aria-hidden="true">&nbsp;Class&nbsp;Remainder</i></a>
                    &nbsp;

                    {{-- <a  href="#" id="s_remainder" data-id="{{$trainer->id}}" class="btn btn-sm btn-primary"><i class="fas fa-bell" aria-hidden="true">&nbsp;Trainer&nbsp;Remainder</i></a> --}}
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
    Trainer&nbsp;Add

    </span>


    </h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body border shadow">

    <form method="post" action="{{url('save')}}" enctype="multipart/form-data">
       @csrf


                       <div class="row justify-content-start">


                           <div class="col-md-6">
                               <label>Trainer&nbsp;Name</label><span class="text-danger"></span></label>
                           </div>

                       </div>

                   <div class="row form-group justify-content-start">


                       <div class="col-md-12">
                               <input type="text" name="name" class="form-control" placeholder="TrainerName">


                       </div>

                   </div>



                   <div class="row justify-content-start">


                       <div class="col-md-6">
                           <label>Email</label><span class="text-danger"></span></label>
                       </div>

                   </div>

               <div class="row form-group justify-content-start">

                   <div class="col-md-12">

                       <input type="email" name="email" placeholder="Email" id="" class="form-control">

                       @error('email')
                          <div class="error" style="color:red;">{{ $message }}</div>
                       @enderror
                   </div>

               </div>



               <div class="row justify-content-start">


                   <div class="col-md-6">
                       <label>Mobile No</label><span class="text-danger"></span></label>
                   </div>

               </div>

           <div class="row form-group justify-content-start">

               <div class="col-md-12">

                   <input type="text" name="mobile" placeholder="Mobile" class="form-control">

               </div>

           </div>



               <div class="row justify-content-start">


                   <div class="col-md-6">
                       <label>Image</label><span class="text-danger"></span></label>
                   </div>

               </div>

           <div class="row form-group justify-content-start">

               <div class="col-md-12">

                   <input type="file" name="file" id="" placeholder="Special" class="form-control">

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
   Edit&nbsp;Trainer

 </span>


 </h5>

 <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
 <span aria-hidden="true">&times;</span>
 </button>
 </div>
 <div class="modal-body border shadow">

 <form method="post" action="{{url('update.trainer')}}" enctype="multipart/form-data">
    @csrf

       <input type="hidden" name="id" id="trainerid" value="">
                <div class="row justify-content-start">


                        <div class="col-md-6">
                            <label>Trainer&nbsp;Name</label><span class="text-danger"></span></label>
                        </div>

                </div>

                <div class="row form-group justify-content-start">


                    <div class="col-md-12">
                            <input type="text" name="name" id="name" value="" class="form-control" placeholder="TrainerName">


                    </div>

                </div>



                <div class="row justify-content-start">


                    <div class="col-md-6">
                        <label>Email</label><span class="text-danger"></span></label>
                    </div>

                </div>


                <div class="row form-group justify-content-start">

                        <div class="col-md-12">

                            <input type="email" name="email" value="" id="email" placeholder="Email" id="" class="form-control">

                        </div>

                </div>



                <div class="row justify-content-start">


                        <div class="col-md-6">
                            <label>Mobile No</label><span class="text-danger"></span></label>
                        </div>

                </div>

                <div class="row form-group justify-content-start">

                <div class="col-md-12">

                        <input type="text" id="mobile" name="mobile" value="" placeholder="Mobile" class="form-control">

                        </div>

                        </div>



                <div class="row justify-content-start">


                    <div class="col-md-6">
                        <label>Image</label><span class="text-danger"></span></label>
                    </div>

                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-12">

                    <input type="file" name="file" id="file" value="" placeholder="Special" class="form-control">

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
                 url:"/TrainerEdit/"+id,

                    // url:"{{ url('TrainerEdit') }}",
                    // data: {"id": id,"_token": "{{ csrf_token() }}"},

                    // type: 'post',

                     success: function(response)
                      {

                        // $("#exampleModal2").modal('show');
                        // $('#tableContent2').html(data.html); trainerid
                        $('#trainerid').val(response.trainer.id);
                        $('#name').val(response.trainer.name);
                        $('#email').val(response.trainer.email);
                        $('#mobile').val(response.trainer.p_no);
                        $('#file').val(response.trainer.image);

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
    $(document).ready(function (e)
    {

        $(document).on('click','#remainder',function()
            {



                var id = $(this).attr('data-id');




                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                   type:"get",
                   url:"/Remainder/"+id,

                  });

            });


    });
 </script>


<script>
    $(document).ready(function (e)
    {

        $(document).on('click','#s_remainder',function()
            {



                var id = $(this).attr('data-id');




                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                   type:"get",
                   url:"/Remainder/"+id,

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
