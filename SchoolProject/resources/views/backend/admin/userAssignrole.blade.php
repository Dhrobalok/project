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


element.style {
    width: 0.75em;
}


.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #453d3d !important;
    border: 1px solid rgb(119, 112, 112)!important;
    border-radius: 4px;
    box-sizing: border-box;
    display: inline-block;
    margin-left: 5px;
    margin-top: 5px;
    padding: 0;
    padding-left: 20px;
    position: relative;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    vertical-align: bottom;
    white-space: nowrap;
}

#model_content3 {
    position: relative;
    display: -ms-flexbox;
    display: middle !important;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 450px!important;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 0.3rem;
    box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 50%);
    outline: 0;
}
</style>


@php
    $i=1;
@endphp
 @section('content')


   <div class="col-md-11">
       <div class="card shadow mt-4">

             <div class="card-header">

                <div align="right">
                    <a  href="{{route('allpermission')}}" class="btn btn-sm btn-success text-right">

                        <i class="fas fa-arrow-circle-left"></i>
                        Back

                    </a>

                </div>


             </div>
          <div class="card-body">



            <div class="table-responsive-sm">

                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User&nbsp;Name</th>
                            <th>Role</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alluser as $user)

                        <tr>

                            <td>{{$i++}}</td>

                            <td>
                                {{$user->name}}
                            </td>


                            @if($user->roles)
                            <td>
                                @foreach ($user->roles as $role )
                                    {{$role->name}}

                                @endforeach
                            </td>



                                @else
                                <td>N/a</td>
                            @endif









{{--
                            <td>
                                <select name="role[]" id="" class="select2" multiple style="width: 220px;">

                                    <option value="">Select Role</option>

                                    @foreach ($roleall as $role)
                                      <option value="{{$role->id}}">{{$role->name}}</option>

                                    @endforeach

                                </select>

                            </td> --}}

                            <td>
                                <div class="d-flex">
                                    <a href="#" data-id="{{$user->id}}"  class="btn-primary active btn-sm edit p-1"><i class="fas fa-edit"></i>&nbsp;Edit</a>

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


   {{-- Update Edit Role Modal --}}

   <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content" id="model_content3">
    <div class="modal-header">
        <center><h4 style="color:red">Edit Role</h4></center>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body border shadow">


        <form action="{{route('update.Userrole')}}" method="post">
            @csrf



            <div class="row justify-content-start">
                <div class="col-md-6">
                    <label for="">User&nbsp;Name</label>

                </div>

            </div>

            <div class="row form-group justify-content-start">

                <div class="col-md-12">
                  <input type="text" name="name" id="user_name" class="form-control" readonly>

                  <input type="hidden" name="id" id="user_id">

                </div>

            </div>



          <div class="row justify-content-start">
                <div class="col-md-6">

                    <label for="">Present Role</label>

                </div>

            </div>

            <div class="row form-group justify-content-start">

                 <div class="col-md-12">

                      <input type="text" class="form-control" id="p_role"  readonly>

                 </div>

            </div>


            <div class="row justify-content-start">
              <div class="col-md-6">

                  <label for="">Select Role</label>

              </div>

          </div>

          @php
              $allrole=App\Models\Role::get();
          @endphp

          <div class="row form-group justify-content-start">

               <div class="col-md-12">

                   <select name="role[]"  class="form-control select2" multiple style="width: 400px; color:rgb(72, 66, 66);">
                      @foreach ($allrole as $role)

                         <option value="{{$role->id}}">{{$role->name}}</option>

                      @endforeach


                   </select>

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



   {{-- Update Edit Role Modal --}}
@endsection

@push('js')

<script>
    $(document).ready(function (e)
    {

        $(document).on('click','.edit',function()
            {


                 const id = $(this).attr("data-id");


                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                    url : "{{ route('update.Assignbatch') }}",
                        type : "get",
                        data :
                        {
                            id : id,


                        },
                        dataType:'json',

                      success: function(data)
                       {

                        $("#exampleModal3").modal('show');

                         $('#user_name').val(data.html.name);
                         $('#user_id').val(data.html.id);
                         $('#p_role').val(data.role);



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
