@extends('backend.Dashboard.AdminDashUser')

@section('css')

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

@endsection


@php
    $i=1;
@endphp
 @section('content')

        <div class="col-md-11 mt-5">

             <div class="card shadow p-3">
                @can('add')
                        <div align="right" >

                <a class="btn btn-primary btn-sm" id = "decline_btn"
                href="{{url('slider.save')}}">
                Slider Image</a>

                        </div>

                @endcan



                 <div class="table-responsive-sm mt-2">



                     <table class="table table-striped js-dataTable-full" id="mytable">

                          <thead>
                              <tr>
                                <th>Id</th>
                                <th>Slider Image</th>
                                <th>Action</th>

                              </tr>
                          </thead>


                          <tbody>
                            @foreach ($allslider as $slider)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{URL::to($slider->image)}}"width="40" height="40" alt=""></td>

                                    <td>
                                         <div class="d-flex">
                                            @can('delete')
                                            <a href="{{route('delete.slider',$slider->id)}}" class="btn-danger btn-sm active" onclick="return confirm('Are you sure?')"><i class="fas fa-times"></i>&nbsp;Delete</a>

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



         <!--  Slider Image -->

    {{-- <div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="f-100" style="font-size:20px;color:#1dbf73">Slider Image</div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                   <form id="decline_confirm">

                       <div class="row justify-content-center">
                           <div class="col-md-6">
                               <label for="">Slider Image</label>

                           </div>

                       </div>

                       <div class="row form-group justify-content-center">
                           <div class="col-md-6">
                               <input type="file" name="image" class="form-control" required>

                               <div class="alert alert-danger" style="display:none">

                               </div>
                           </div>

                       </div>

                       <div class="row text-center">
                        <div class="col-md-12">
                          <button type = "submit"   class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                   </form>
                </div>
            </div>
        </div>
    </div> --}}
 @endsection










