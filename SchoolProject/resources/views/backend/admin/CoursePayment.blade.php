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
     <a  href="#" id="addCourse" class="btn btn-sm btn-success"><i class="fa fa-plus p-1" aria-hidden="true">&nbsp;Course&nbsp;Payment</i></a>


    @endcan

</div>



<div class="card-body">



<div class="table-responsive-sm p-0 m-0">


<table class="table table-hover table-striped mt-2 w-100" id="myTable">


 <thead>

         <th>Id</th>
         <th>Course&nbsp;Name</th>
         <th>FullPayment</th>
         <th>Installment</th>
         <th>special</th>

         <th>Action</th>

 </thead>

 <tbody>

   @php
        $allpayment=App\Models\Payment::get();
       $i=1;
   @endphp

      @foreach ($allpayment as $payment)

           <tr>
               <td>{{$i++}}</td>

               @php
                   $coursename=App\Models\Course::where('id',$payment->course_id)->first();
               @endphp

               @if ($coursename)

                 <td>{{$coursename->name}}</td>

                 @else
                   <td>N/A</td>

               @endif

               <td>{{$payment->fullpayment}}</td>
               <td>{{$payment->installment}}</td>
               <td>{{$payment->special}}</td>

               <td>

                   <div class="d-flex gap-1">

                       @can('edit')
                       <a id="PaymentEdit" data-id={{$payment->id}}  class="btn btn-sm btn-primary"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i></a>

                       @endcan

                       &nbsp;

                       @can('delete')
                       <a href="{{route('PaymentDelete',$payment->id)}}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Delete</i></a>

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
Course&nbsp;Payment

</span>


</h5>

<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body border shadow">

<form method="post" action="{{route('Course.Payment')}}">
   @csrf


                   <div class="row justify-content-start">


                       <div class="col-md-6">
                           <label>Course&nbsp;Name</label><span class="text-danger"></span></label>
                       </div>

                   </div>

               <div class="row form-group justify-content-start">

                        @php
                            $allcourse=App\Models\Course::where('active',1)->get();
                        @endphp

                   <div class="col-md-12">
                      <select name="course_id" id="" class="form-control">
                       <option value="">Choose Course</option>
                       @foreach ($allcourse as $course)
                       <option value="{{$course->id}}">{{$course->name}}</option>

                       @endforeach

                      </select>



                   </div>

               </div>



               <div class="row justify-content-start">


                   <div class="col-md-6">
                       <label>Fullpayment</label><span class="text-danger"></span></label>
                   </div>

               </div>

           <div class="row form-group justify-content-start">

               <div class="col-md-12">

                   <input type="text" name="fullpayment" placeholder="Fullpayment" id="" class="form-control">

               </div>

           </div>



           <div class="row justify-content-start">


               <div class="col-md-6">
                   <label>Installment</label><span class="text-danger"></span></label>
               </div>

           </div>

       <div class="row form-group justify-content-start">

           <div class="col-md-12">

                 <select name="installment" id="" class="form-control">

                    <option value="">Please Select One</option>

                    <option value="1">One Month</option>
                    <option value="2">Two Months</option>
                    <option value="3">Three Months</option>
                    <option value="4">Four Months</option>
                    <option value="5">Five Months</option>
                    <option value="6">Six Months</option>
                    <option value="7">Seven Months</option>
                    <option value="8">Eight Months</option>
                    <option value="9">Nine Months</option>
                    <option value="10">Ten Months</option>
                    <option value="11">Eleven Months</option>
                    <option value="12">Twelve Months</option>


                 </select>

               {{-- <input type="text" name="installment" placeholder="Installment" class="form-control"> --}}

           </div>

       </div>



           <div class="row justify-content-start">


               <div class="col-md-6">
                   <label>Special</label><span class="text-danger"></span></label>
               </div>

           </div>

       <div class="row form-group justify-content-start">

           <div class="col-md-12">

               <input type="text" name="special" id="" placeholder="Special" class="form-control">

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
    Course&nbsp;Payment

    </span>


    </h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body border shadow">

    <form method="post" action="{{url('update.Payment')}}">
       @csrf


       <div id="tableContent2">

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

          $(document).on('click','#PaymentEdit',function()
              {

                  var id = $(this).attr("data-id");


                  event.preventDefault();
                  jQuery.noConflict();

                  $.ajax({

                      url: "{{ route('PaymentEdit') }}",
                      data: {"id": id,"_token": "{{ csrf_token() }}"},

                      type: 'post',

                        success: function(data)
                         {

                           $("#exampleModal2").modal('show');
                           $('#tableContent2').html(data.html);

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
