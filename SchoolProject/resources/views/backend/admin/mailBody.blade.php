@extends('backend.Dashboard.AdminDashUser')
<style>
 #myTable th
 {
     color:rgb(250, 235, 235);
 font-size:13px;
 line-height: 4px;
 text-transform:capitalize;
 font-weight: 400px !important;
 width: 20px !important;
 background-color: rgb(129, 152, 212)
 }

 #myTable td
 {

 font-size:14px;
 line-height: 17px;
 text-transform:capitalize;
 font-weight: 400px !important;
 width: 20px !important;

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

  @php
      $mails=App\Models\Mail::get();
      $i=1;
  @endphp

   <div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">

            {{-- <a  href="#" id="Addhead" class="btn btn-sm btn-primary">Add&nbsp;Head</a>
            <a  href="#" id="Addmessage" class="btn btn-sm btn-secondary">Add&nbsp;Message</a> --}}


        </div>



        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100" id="myTable">


                  <thead>



                          <th>Id</th>
                          <th>MessageBody</th>
                          <th>Action</th>


                  </thead>

                  <tbody>

                    @foreach ($mails as $mail)

                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$mail->messagebody}}</td>

                            <td>
                                @can('add')
                                <a href="{{url('edit.message',$mail->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

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





   {{-- Edit Message --}}

  <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Edit&nbsp;Message

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">



           <span style="color:rgb(110, 73, 73)">N:B: You have to included &Coursename &highmark &youmark</span>
           <form action="{{route('message.update')}}" method="post">
            @csrf

            <div class="row justify-content-start">

                  <div class="col-md-6">
                     <label for="">Enter Message</label>

                  </div>

            </div>


            <div class="row form-group justify-content-start">

                <textarea name="message" id="mail" cols="10" rows="5" class="form-control">

                </textarea>

              {{-- <input type="text" id="mail" name="head" value="" class="form-control" placeholder="Enter Message Head"> --}}

            </div>


            <div class="row justify-content-center">
                <button class="btn btn-primary">Submit</button>

            </div>

        </form>


        </div>

      </div>
    </div>
  </div>




   {{-- Add Message --}}

  <div class="modal fade" id="exampleModal2"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Add&nbsp;Message

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">


           <form action="{{route('message.save')}}" method="post">
            @csrf

            <div class="row justify-content-start">

                  <div class="col-md-6">
                     <label for="">Write Message</label>

                  </div>

            </div>


            <div class="row form-group justify-content-start">

               <textarea name="message" id="" cols="10" rows="5" class="form-control">

               </textarea>

            </div>


            <div class="row justify-content-center">
                <button class="btn btn-primary">Submit</button>

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

        $(document).on('click','#Addhead',function()
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

        $(document).on('click','#Addmessage',function()
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
    $(document).ready(function (e)
    {

        $(document).on('click','#edit',function()
            {


                const id = $(this).attr("data-id");







                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                    type:"get",
                     url:"/edit.message/"+id,



                      success: function(data)
                       {



                        $('#mail').val(data.messagebody);
                        $('#id_m').val(data.id);
                        $("#exampleModal").modal('show');


                       }
               });

            });


    });
 </script>

@endpush
