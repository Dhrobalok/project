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


 <div class="col-md-12">

    <div class="card shadow p-2 mt-2">




        <div class="card-body">



           <div class="table-responsive-sm p-0 m-0">


               <table class="table table-hover table-striped mt-2 w-100" id="myTable">



                 <thead>

                         <th>Id</th>
                         <th>Course&nbsp;Name</th>

                         <th>Batch&nbsp;No</th>

                         <th>Action</th>

                 </thead>

                 <tbody>

                   @php
                        $i=1;
                   @endphp



                       @foreach ($batchinfo as $allcontent)
                           @php
                                   $batchall=App\Models\Batch::select('batch_number')->where('course_id',$allcontent->course_id)->distinct()->get();
                                   $courseName=App\Models\Course::where('id',$allcontent->course_id)->first();

                           @endphp

                          @foreach ($batchall as $batch)

                            @php
                                $batchmemeber=App\Models\Courseenroll::where('course',$allcontent->course_id)
                                ->where('batch',$batch->batch_number)
                                ->get();

                                $batchday=App\Models\Batch::where('course_id',$allcontent->course_id)
                                ->where('batch_number',$batch->batch_number)
                                ->first();

                                $totalmember=count($batchmemeber);
                            @endphp

                          <tr>
                           <td>{{$i++}}</td>

                           @if ($courseName)
                             <td>{{ucwords($courseName->name)}}</td>


                             @else

                             <td>N/A</td>

                           @endif

                           <td>{{$batch->batch_number}}</td>






                           <td id={{$allcontent->course_id}} class="date">

                               <div class="d-flex gap-1">

                                   @can('edit')
                                   <button value="{{$batch->id}}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Payment&nbsp;Report</i>
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                  </button>

                                   @endcan


                                   @can('delete')
                                     <a href="javascript:void(0);" data-id="{{$batch->batch_number}}" class="btn btn-sm btn-danger delete"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Close&nbsp;Batch</i></a>

                                   @endcan


                                    &nbsp;

                                    @can('add')
                                    <a href="javascript:void(0);" data-id="{{$batch->batch_number}}"  class="btn btn-sm btn-secondary sms"><i class="fas fa-envelope" style="font-size: 12px;padding:2px;">&nbsp;Sms</i></a>

                                    @endcan


                               </div>
                           </td>


                       </tr>

                       @endforeach


                    @endforeach




                 </tbody>

               </table>

           </div>


       </div>

   </div>

 </div>



 @endsection
