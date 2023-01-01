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

 @section('content')

       <div class="col-md-6">


                <div class="card shadow mt-2 p-4">

                    <div align="right">

                        <a class="btn btn-primary btn-sm" id = "decline_btn"
                        href="{{route('FooterLink')}}"><i class="fas fa-arrow-circle-left"></i>
                        Back</a>

                    </div>


           <form action="{{route('FooterCreate')}}"  method="post">
            @csrf
            <div class="card-body">
                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <label for="">Link Name*</label>

                    </div>

                </div>

                <div class="row group-form justify-content-start">

                     <div class="input-group hdtuto control-group lst increment" >

                          <select name="name" id=""  class="myfrm form-control">
                            <option value="">Choose Option</option>
                             <option value="Facebook">Facebook</option>
                             <option value="Youtube">Youtube</option>
                             <option value="Twitter">Twitter</option>
                             <option value="Instagram">Instagram</option>
                          </select>
                         {{-- <input type="text" name="name" class="myfrm form-control" placeholder="Course Name" required> --}}


                      </div>
                    </div>


                    <div class="row justify-content-start mt-1">
                        <div class="col-md-6">
                            <label for="">Link*</label>

                        </div>

                    </div>


                    <div class="row group-form justify-content-start">

                        <input type="text" name="link" class="myfrm form-control" placeholder="Footer Link" required>

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
