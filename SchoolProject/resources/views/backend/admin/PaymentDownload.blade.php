


<!DOCTYPE html>
<html>

<head>

    <style type="text/css">
    @page {
        size: 8.5in 11in;
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 35px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        border: 1px solid #000;
        padding: 2px;
        text-align: center;
        font-size: 10.5pt;
    }

    .footer {
        padding-top: 40px;
        width: 100%;
    }

    .footer tr {
        text-align:left;
        width: 25%;
        font-size: 10.5pt;
        font-weight: bold;
    }

    .heading p {
        text-align: center;
        margin-bottom: 0;
    }

    .heading h5 {
        text-align: center;
        margin-top: 0;
        padding-top: 0;
    }

    p {
        font-size: 10pt;
    }

    .left {
        text-align: left;
        float: left;
        clear: none;
        width: 50%;
    }

    .right {
        text-align: right;
        float: right;
        clear: none;
        width: 50%;
    }

    .inline {
        clear: both;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
    }
    .text-normal
    {
        font-weight:normal;
    }

    </style>
</head>

<body>
    <div class="container">

            @php
                $company=App\Models\Company_settings::first();
            @endphp

            @if ($company)
                <h3 style="text-align:center"><img src="{{URL::to($company->image)}}" height = "40px" width = "40px;"></h3>

                <h4 style="text-align:center;line-height:5px">{{ucwords($company->name)}}</h4>

                    <br>

                    <h4 style="text-align:center;line-height:5px"><span style="font:bold;">Sub:</span> Student Payment </h4>

                    <br>
            @else

                <h3 style="text-align:center"><img src = "" height = "40px" width = "40px;"></h3>

                <h4 style="text-align:center;line-height:5px"></h4>

                    <br>

                    <h4 style="text-align:center;line-height:5px"><span style="font:bold;">Sub:</span> Student Payment </h4>

                    <br>

            @endif



        <table class="table">



    <thead>
        <tr>
            <th scope="col">Student Name</th>
            <th scope="col">Course Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
        </tr>


    </thead>

            <tbody>

                @foreach ($allpayment as $payment)
                <tr>

                    @if ($payment->username)

                    <td>{{$payment->username->name}}</td>

                    @else

                    <td>N/a</td>

                    @endif


                    @if ($payment->CourseName)

                    <td>{{$payment->CourseName->name}}</td>

                    @else

                    <td>N/a</td>

                    @endif

                    <td>{{$payment->amount}}</td>

                    <td>{{$payment->created_at}}</td>




                </tr>

                @endforeach

            </tbody>
          </table>


          {{--


          <table class = "footer">
            <thead>
                <tr>

                    <td style = "text-align:right">
                        <strong >Total=</strong>
                        <strong>{{ $total->total_pay }}</strong>


                    </td>
                  </tr>


            </thead>
        </table>
        --}}


    </div>
</body>

</html>
