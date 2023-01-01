@extends('backend.Dashboard.AdminDashUser')

@section('css')
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

 @section('content')



        <div class="col-md-6 mt-5">

             <div class="card shadow p-3">

                        <div align="right" >

                            <a class="btn btn-primary btn-sm" id = "decline_btn"
                            href="{{route('Seminar')}}"><i class="fas fa-arrow-circle-left"></i>
                            Back</a>

                        </div>


               <form action="{{route('SeminarCreate')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <label for="">Course Name*</label>

                        </div>

                    </div>

                    <div class="row group-form justify-content-start">

                      <div class="input-group hdtuto control-group lst increment" >
                          <input type="text" name="name" class="myfrm form-control" placeholder="Course Name" required>&nbsp;&nbsp;
                          {{-- <input type="file" name="image[]" class="myfrm form-control">
                          <div class="input-group-btn">
                            <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add More</button>
                          </div> --}}

                          {{-- @if (count($errors) > 0)
                          <div class=" alert-danger mt-4">

                              <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                          </div>
                          @endif --}}

                         </div>
                        </div>


                        <div class="row justify-content-start mt-1">
                            <div class="col-md-6">
                                <label for="">Course&nbsp;Image*</label>

                            </div>

                        </div>


                        <div class="row group-form justify-content-start">

                            <input type="file" name="image" class="myfrm form-control" required>

                            @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif

                        </div>


                        <div class="row justify-content-start mt-1">
                            <div class="col-md-6">
                                <label for="">Seminar&nbsp;Date*</label>

                            </div>

                        </div>


                        <div class="row group-form justify-content-start">

                            <input type="date" name="date" class="myfrm form-control" required>

                        </div>


                        <div class="row justify-content-start mt-1">
                            <div class="col-md-6">
                                <label for="">Seminar&nbsp;Time*</label>

                            </div>

                        </div>


                        <div class="row group-form justify-content-start">

                            <input type="time" name="time" class="myfrm form-control" required>

                        </div>



                    </div>



                    <div class="row justify-content-center mt-5">
                        <button type="submit" class="btn btn-primary">

                          submit

                        </button>

                    </div>
                </div>


               </form>

             </div>

        </div>

 @endsection

 @push('js')
 <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){
          $(this).parents(".hdtuto").remove();
      });
    });
</script>

 @endpush









