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

   <div class="col-md-11">

    <form action="{{route('Mailsetting.save')}}" method="post">
        @csrf
        <div class="card shadow mt-4 p-4" style="background-color: rgb(255, 255, 255);">

            <div class="card-header">
                <h4>Mail Setting</h4>


                <a href="{{route('mail.configuration')}}" class="btn btn-sm btn-primary" style="float: right;">
                   <i class="fas fa-arrow-alt-circle-left"></i>
                    Back
                </a>




            </div>

            <div class="card-body">

                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Mail Transport</label>

                    </div>

                    <div class="col-md-6">
                        <label for="">Mail Host</label>

                    </div>

                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mail_transport" placeholder="Mail Transport">

                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mail_host" placeholder="Mail Host">

                    </div>

                </div>


                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Mail Port</label>

                    </div>

                    <div class="col-md-6">
                        <label for="">Mail Username</label>

                    </div>

                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mail_port" placeholder="Mail Port">

                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mail_username" placeholder="Mail Username">

                    </div>

                </div>



                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Mail Password</label>

                    </div>

                    <div class="col-md-6">
                        <label for="">Mail Encryption</label>

                    </div>

                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mail_pass" placeholder="Mail Password">

                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mail_encrypt" placeholder="Mail Encryption">

                    </div>

                </div>



                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Mail From</label>

                    </div>

                </div>


                <div class="row form-group justify-content-start">
                    <div class="col-md-12">
                        <input type="text" name="mail_form" class="form-control" placeholder="Mail From">

                    </div>

                </div>





            </div>


            <div class="row justify-content-center">

                <button class="btn btn-primary">Submit</button>

            </div>


        </div>

      </form>
   </div>
 @endsection
