@extends('backend.Dashboard.dashboardUser')


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

.select2-container--default .select2-search--inline .select2-search__field

{
    background: transparent;
    /* background-color: #081824 !important; */

    outline: 0;
    outline-color: initial;
    outline-style: initial;
    outline-width: 0px;
    box-shadow: none;
    -webkit-appearance: textfield;
    width:220px!important;
    /* border: 1px solid rgb(83, 74, 74) !important;
    color: black!important; */
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #8d6d6d !important;
    border: 1px solid rgb(53, 47, 47)!important;
    border-radius: 4px;
    /* c.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #e4e4e4;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
} */

}
</style>

@section('content')


        <p class="text-center">
            <img src="{{ asset('images/4WYgORYERneMHCAVLl4s.png') }}" alt="" width="50" style="border-radius: 80%;">


        </p>


        @if($red)

            <script>
                alert('Your Payment Has Been Cancelled');
            </script>

        @endif

        @if (Session::has('success'))

        <div class="card shadow">
            <div class="card-body">



                 <table class="table table-borderless">

                    <tbody>

                        <tr>

                            <th>Course Name</th>




                            <td></td>

                            @if ($courseenroll->course_id)
                                <td>{{$courseenroll->course_id->name}}</td>


                             @else

                               <td>N/A</td>

                         @endif
                        </tr>

                        <tr>
                            <th>Amount</th>
                            <td></td>
                            <td>{{$courseenroll->amount}}</td>
                        </tr>

                        <tr>
                             <th>Message</th>
                             <td></td>
                             <td>

                                <div class="alert alert-success">
                                    {{ session::get('success') }}
                                </div>
                             </td>

                        </tr>


                    </tbody>


                 </table>
                @endif


                @if (Session::has('error'))



                <table class="table table-borderless">

                    <tbody>

                        <tr>

                            <th>Course Name</th>




                            <td></td>

                            @if ($courseenroll->course_id)
                                <td>{{$courseenroll->course_id->name}}</td>


                             @else

                               <td>N/A</td>

                         @endif
                        </tr>

                        <tr>
                            <th>Amount</th>
                            <td></td>
                            <td>{{$courseenroll->amount}}</td>
                        </tr>

                        <tr>
                             <th>Message</th>
                             <td></td>
                             <td>

                                <div class="alert alert-success">
                                    {{ session::get('error') }}
                                </div>
                             </td>

                        </tr>


                    </tbody>

                </table>


            </div>

        </div>

        @endif

    </div>



</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection



