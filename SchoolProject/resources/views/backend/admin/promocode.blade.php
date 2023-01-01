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

 <div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">

            <div class="gap-3">

                @can('add')
                  <a  href="#" id="addpromocode" class="btn btn-sm btn-info">&nbsp;Add&nbsp;Promocode</a>&nbsp;

                @endcan


            </div>



        </div>





        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100" id="myTable">


                  <thead>

                          <th>Id</th>
                          <th>Course&nbsp;Name</th>

                          <th>Code</th>
                          <th>Discount</th>
                          <th>From</th>
                          <th>To</th>
                          <th></th>


                  </thead>

                  <tbody>

                        @php
                            $promocode=App\Models\Promocode::get();
                            $i=1;
                        @endphp


                     @foreach ($promocode as $promocodes)

                        <tr>
                            <td>{{$i++}}</td>

                            @if ($promocodes->coursename)

                              <td>{{ucwords($promocodes->coursename->name)}}</td>

                              @else

                              <td>N/a</td>

                            @endif


                            <td>{{$promocodes->code}}</td>

                            <td>{{$promocodes->discount}}</td>

                            <td>{{$promocodes->from}}</td>
                            <td>{{$promocodes->to}}</td>

                            <td>
                                @can('edit')
                                <a href="#" data-id="{{$promocodes->id}}" class="btn btn-sm btn-primary edit"><i class="fas fa-edit"></i></a>

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



 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <center><h4 style="color:red">Promo Code</h4></center>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body border shadow">


        <form action="{{url('promocode.save')}}" method="post">
            @csrf

            <div class="row justify-content-start">

                <div class="col-md-6">

                    <label for="">Select Course</label>

                </div>


            </div>


            <div class="row form-group justify-content-start">

                <div class="col-md-12">

                    @php
                        $course=App\Models\Course::where('active',1)->get();
                    @endphp

                    <select name="course_id" id="" class="form-control">

                        <option value="">Choose Course</option>

                        @foreach ($course as $courseall)

                           <option value="{{$courseall->id}}">{{$courseall->name}}</option>

                        @endforeach


                    </select>

                </div>

            </div>



            <div class="row justify-content-start">

                <div class="col-md-6">

                    <label for="">Promo Code</label>

                </div>


                <div class="col-md-6">

                    <label for="">Discount %</label>

                </div>


            </div>


            <div class="row form-group justify-content-start">

                <div class="col-md-6">

                    <input type="text" name="code" class="form-control" placeholder="Enter Promo Code">

                </div>


                <div class="col-md-6">

                    <input type="text" name="discount" class="form-control" placeholder="Enter Discount">

                </div>

            </div>




            <div class="row justify-content-start">

                <div class="col-md-6">

                    <label for="">From</label>

                </div>


                <div class="col-md-6">

                    <label for="">To</label>

                </div>


            </div>


            <div class="row form-group justify-content-start">

                <div class="col-md-6">

                    <input type="date" name="from" class="form-control" placeholder="Enter Promo Code">

                </div>


                <div class="col-md-6">

                    <input type="date" name="to" class="form-control" placeholder="Enter Discount">

                </div>

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




    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <center><h4 style="color:red">Edit PromoCode</h4></center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body border shadow">


            <form action="{{route('promocode.update')}}" method="post">
                @csrf



                <div id="promo_details">

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



 @endsection


 @push('js')

 <script>
    $(document).ready(function (e)
    {

        $(document).on('click','#addpromocode',function()
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


                    url : "{{ route('promo.edit') }}",
                        type : "get",
                        data :
                        {
                            id : id,


                        },
                        dataType:'json',



                      success: function(data)
                       {

                        $('#promo_details').append(data.html);

                          $("#exampleModal2").modal('show');


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

