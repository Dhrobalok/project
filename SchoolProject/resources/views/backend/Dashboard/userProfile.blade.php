@extends('backend.Dashboard.dashboardUser')


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


     <div class="col-md-7">

        <p class="text-center mt-5">
            <img src="{{ asset('images/4WYgORYERneMHCAVLl4s.png') }}" alt="" width="50" style="border-radius: 80%;">


        </p>


        <div class="card shadow">

            <div class="card-header shadow">

                <p class="text-center m-0 p-0" style="font-size: 20px;">User Profile</p>

            </div>

            <div class="card-body p-2">

                <div class="table-responsive-sm">
                    <table class="table table-borderless">

                        <tr>
                            <th>Name</th>
                              <td></td>

                            <td>{{$user->name}}</td>






                        </tr>

                        <tr>

                            <th>Roll</th>

                            <td></td>

                            <td>{{$user->id}}</td>



                        </tr>


                        <tr>

                            <th>Email</th>

                            <td></td>


                            <td>{{$user->email}}</td>

                        </tr>








                        @foreach ($enroll as $enrollall)



                              <tr>
                                  <th>Course&nbsp;Name</th>
                                  <td></td>

                                  @if ($enrollall->course_id)

                                     <td>{{$enrollall->course_id->name}}</td>
                                   @else

                                   <td>N/A</td>

                                  @endif

                                  <th>Payment&nbsp;Status</th>

                                  <td></td>
                                  @if ($enrollall->active==1)

                                    <td>Pay</td>

                                    @else
                                    <td>Due</td>


                                  @endif

                              </tr>

                        @endforeach



                  </table>

                </div>



            </div>



        </div>



     </div>


@endsection
