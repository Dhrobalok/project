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

<div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">


        </div>



        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100" id="myTable">

                    @php

                        $i=1;
                    @endphp

                  <thead>

                          <th>Id</th>
                          <th>Course&nbsp;Name</th>

                          <th>Content File</th>
                          <th>Content&nbsp;Link</th>


                  </thead>

                  <tbody>



                        @foreach ($courseall as $allcontent)


                            <tr>
                                <td>{{$i++}}</td>

                                @if ($allcontent->course_content)
                                  <td>{{$allcontent->course_content->name}}</td>


                                  @else

                                  <td>N/A</td>

                                @endif


                                @if ($allcontent->type=='mp4')
                                    <td>

                                        <iframe src="{{URL::to($allcontent->file)}}" frameborder="0">
                                        </iframe>
                                    </td>

                                  @else

                                    <td>
                                        <a href="{{route('file.download',$allcontent->id)}}" class="btn btn-alt-info"><i class="fas fa-download" style="color: rgb(104, 166, 233);"></i></a>
                                    </td>

                                @endif


                                <td>

                                    <iframe src="{{URL::to($allcontent->link)}}" frameborder="0" width="100%" height="80">

                                    </iframe>

                                    {{-- <a href="{{$allcontent->link}}">View Link</a> --}}

                                </td>







                            </tr>
                     @endforeach




                  </tbody>

                </table>

            </div>


        </div>

    </div>


 </div>

@endsection
