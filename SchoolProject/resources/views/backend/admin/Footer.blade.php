@extends('backend.Dashboard.AdminDashUser')
<style>
    #mytable th
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

#mytable_filter
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
        <div class="text-right p-2">

            @can('add')
              <a  href="{{route('add.footer')}}" id="addCourse" class=" btn-sm btn-primary">&nbsp;AddFooterLink</a>

            @endcan



        </div>





        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100 js-dataTable-full" id="mytable">


                  <thead>

                        <th>
                            Id
                        </th>
                        <th>Link&nbsp;Name</th>
                        <th>Link</th>
                        <th></th>

                  </thead>

                  @php
                      $i=1;
                  @endphp
                  <tbody>
                       @foreach ($links as $alllinks)

                            <tr>

                                  <td>{{$i++}}</td>

                                  <td>{{$alllinks->name}}</td>
                                  <td>{{$alllinks->link}}</td>
                                  <td>

                                    @can('delete')
                                    <a href="{{route('footer.delete',$alllinks->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Delete</i></a>
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
 @endsection
