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



        <div class="col-md-6 mt-5">

             <div class="card shadow p-3">

                        <div align="right" >

                            <a class="btn btn-primary btn-sm" id = "decline_btn"
                            href="{{route('Slider.image')}}"><i class="fas fa-arrow-circle-left"></i>
                            Back</a>

                        </div>


               <form action="{{route('sliderImage')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <label for="">Slider Image</label>

                        </div>

                    </div>

                    <div class="row group-form justify-content-center">

                      <div class="input-group hdtuto control-group lst increment" >
                          <input type="file" name="image[]" class="myfrm form-control">
                          <div class="input-group-btn">
                            <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add More</button>
                          </div>

                          @if (count($errors) > 0)
                          <div class=" alert-danger mt-4">

                              <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                          </div>
                          @endif

                        </div>


                        <div class="clone hide" style="display: none;">
                          <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                            <input type="file" name="image[]" class="myfrm form-control">
                            <div class="input-group-btn">
                              <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>Remove</button>
                            </div>

                                
                          </div>
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









