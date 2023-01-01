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

   <div class="col-md-6">

        <div class="card shadow mt-3">

            <div class="card-header">Edit Message</div>
            <div class="card-body">
                N:B:<span style="color:rgb(199, 45, 45)"> You have to included &Coursename &highmark &youmark in your comment</span>
                <form action="{{route('message.update')}}" method="post" class="mt-4">
                    @csrf


                    <input type="hidden" name="id" value="{{$mail->id}}">
                    <div class="row justify-content-start">

                          <div class="col-md-6">
                             <label for="">Update Message</label>

                          </div>

                    </div>


                    <div class="row form-group justify-content-start">

                        <textarea name="message"   cols="5" rows="5" class="form-control">
                            {{$mail->messagebody}}
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


@endsection
