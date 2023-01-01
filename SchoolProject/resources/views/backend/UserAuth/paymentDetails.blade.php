<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rajIT School</title>
    <link rel = "icon" href="{{asset('images/4WYgORYERneMHCAVLl4s.png')}}"
  type = "image/x-icon">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href=
    "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity=
    "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">

            @include('backend.header-footer-files.css_files')
            @include('backend.header-footer-files.js_files')

    <style>
        .btn-success
        {
            width: 200px !important;
            text-align: center !important;
        }
    .password+.fa, .cPassword+.fa
     {
    top: 50%;
    right: 5px;
    position: absolute;
    color: #666;
    cursor: pointer;
    pointer-events: all;
    -webkit-transform: translate(-5px, -50%);
    -ms-transform: translate(-5px, -50%);
    transform: translate(-19px, -50%);
    font-size: 16px;
}

body
    {

        background-color: rgb(234, 225, 225);


    }




    </style>
</head>
<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 p-4 mt-2">
                    <div class="row justify-content-center p-2">
                        <img src="{{ asset('images/4WYgORYERneMHCAVLl4s.png') }}" alt="" width="70" style="border-radius: 80%;">



                     </div>

                    <div class="card">

                        <div class="card-body shadow">



                                {{-- @if ($userid->category_name)
                                  {{$userid->category_name->name}}

                                @else



                                @endif --}}

                                <table class="table table-borderless">

                                    <tr>
                                        <th>Your Billing Id</th>
                                        <td>{{$userid->id}}</td>
                                    </tr>

                                    <tr>
                                        <th>Course Name</th>
                                        @if ($userid->course_id)
                                        <td>{{$userid->course_id->name}}</td>
                                        @else
                                        <td>N/A</td>

                                        @endif

                                    </tr>

                                    <tr>
                                        <th> Payment System</th>
                                        <td>{{$userid->payment}}</td>
                                    </tr>

                                    <tr>
                                        <th> Payment Duration</th>

                                        @if ($userid->course_id)
                                          <td>{{$userid->course_id->duration}}&nbsp;Month</td>

                                        @endif

                                    </tr>


                                    <tr>

                                        <div class="text-center p-2">

                                            @if ($userid->payment=='fullpayment')
                                            @if ($userid->course_id)

                                              N.B: You have to Pay{{$userid->course_id->fees}}
                                            @endif

                                        @endif



                                        @if ($userid->payment=='installment')
                                            @if ($userid->course_id)
                                               @php
                                                   $payment=App\Models\Payment::where('course_id',$userid->course)->first();
                                               @endphp

                                               @if ($payment)

                                               <span style="color: red;">
                                                  N.B: You have to Pay{{$userid->course_id->fees/$payment->installment}} for each month

                                               </span>


                                                 @else

                                                 <span style="color: red;">
                                                    N.B: You have to Pay  for each month

                                                 </span>


                                               @endif


                                            @endif

                                        @endif


                                        </div>



                                    </tr>









                                </table>




                                <div class="footer">

                                     <div class="text-center">


                                        

                                        <a href="#">

                                            <img src="{{asset('images/BKash-Icon2-Logo.wine.svg')}}" width="120" alt="">


                                        </a>



                                     </div>

                                </div>



                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>








</body>


</html>
