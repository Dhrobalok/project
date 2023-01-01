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
                    <a  href="#" id="addheader" class="btn btn-sm btn-info">&nbsp;Add&nbsp;Header</a>&nbsp;
                    <a  href="#" id="adddescription" class="btn btn-sm btn-success">&nbsp;Add&nbsp;Description</a>

                @endcan


            </div>



        </div>





        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100" id="myTable">


                  <thead>

                          <th>Date</th>
                          <th>Header</th>

                          <th>Description</th>
                          <th>Amount</th>


                  </thead>

                  <tbody>

                    @php
                        $alldescription=App\Models\Description::get();
                        $total=0;
                    @endphp

                    @foreach ($alldescription as $description)

                    <tr>

                      <td>{{$description->date}}</td>
                      <td>{{$description->name}}</td>
                      <td>{{$description->description}}</td>
                      <td>{{$description->amount}}</td>

                    </tr>

                    @php
                        $total=$total+$description->amount;
                    @endphp

                    @endforeach



                  </tbody>

                  <tr style="background-color:rgb(206, 234, 234);">
                    <td><strong>Total</strong></td>
                    <td></td>
                    <td></td>
                    <td><strong>{{$total}}</strong>&nbsp;<span style="font-family: serif;">&#2547;</span></td>
                 </tr>


                </table>

            </div>


        </div>

    </div>


 </div>




 {{-- Add Header --}}

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Add&nbsp;Header

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('Header.Add')}}" enctype="multipart/form-data">
                    @csrf



                    <div class="row justify-content-start">

                        <div class="col-md-6">

                            <label for="">Header</label>

                        </div>

                    </div>



                    <div class="row form-group justify-content-start">

                        <div class="col-md-12">

                            <input type="text" name="name"  class="form-control" placeholder="Add Header">

                        </div>

                    </div>






                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary">Header&nbsp;Save</button>

                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>
  </div>





  {{-- Add Description --}}


  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Add&nbsp;Description

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('Description.Add')}}" enctype="multipart/form-data">
                    @csrf



                    <div class="row justify-content-start">

                        <div class="col-md-6">

                            <label for="">Select Header</label>

                        </div>

                    </div>



                    <div class="row form-group justify-content-start">

                        <div class="col-md-12">

                            @php
                                $header=App\Models\Header::get();
                            @endphp


                            <select name="name" id="" class="form-control">

                                <option value="">Select Option</option>

                                @foreach ($header as $headerall)

                                   <option value="{{$headerall->name}}">{{$headerall->name}}</option>

                                @endforeach

                            </select>





                        </div>

                    </div>


                    <div class="row justify-content-start">
                        <div class="col-md-6">
                          <label for="">Date</label>

                        </div>

                  </div>


                  <div class="row form-group justify-content-start">

                      <div class="col-md-12">
                          <input type="date" class="form-control" name="date" placeholder="Enter Amount">

                      </div>

                  </div>




                    <div class="row justify-content-start">
                          <div class="col-md-6">
                             <label for="">Description</label>

                          </div>

                    </div>


                    <div class="row form-group justify-content-start">

                        <div class="col-md-12">
                            <textarea name="description" id="" cols="30" rows="5" class="form-control">


                            </textarea>

                        </div>

                    </div>


                    <div class="row justify-content-start">
                        <div class="col-md-6">
                          <label for="">Amount</label>

                        </div>

                  </div>


                  <div class="row form-group justify-content-start">

                      <div class="col-md-12">
                          <input type="text" class="form-control" name="amount" placeholder="Enter Amount">

                      </div>

                  </div>




                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary">Header&nbsp;Save</button>

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

        $(document).on('click','#addheader',function()
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

        $(document).on('click','#adddescription',function()
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
    function myFunction2()
    {
      location.reload();
    }
    </script>

 @endpush

