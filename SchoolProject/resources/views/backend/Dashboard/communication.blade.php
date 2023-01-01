@extends('backend.Dashboard.master')


<style>
      #image
      {
        background-image: url('images/breadcumb-bg.jpg');
        background-color:rgba(77, 71, 71, 0.2);
      }
</style>

@section('content')



   @php
       $company=App\Models\Company_settings::first();
   @endphp

<section>

    <div class="container">
        <div class="row">




            <div class="col-md-8 mt-5">

                <h3>Corporate&nbsp;Office</h3>


                <table>
                    <tr>
                        <td>{{ucwords($company->address)}}</td>

                    </tr>







                    <tr>


                        <td>
                            <br>
                            <strong style="font-size:18px;">Email:</strong>
                            <a data-sal="slide-left" data-sal-delay="300" data-sal-duration="800" data-sal-easing="ease" href="mailto:info@rajit.net" class="sal-animate">
                             <span style="color:rgb(118, 80, 73);">
                                {{$company->email}}
                            </span>
                           </a>
                        </td>

                    </tr>



                    <tr>


                        <td>
                            <strong style="font-size:18px;">Mobile:</strong>
                            {{$company->mobile}}
                        </td>

                    </tr>






                    <tr>

                        <td>
                            <br><br>
                            <iframe src="{{$company->location}}" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </td>
                    </tr>




                </table>

            </div>



            <div class="col-md-4 mt-5">

                <h3>Training&nbsp;Center</h3>


                <table>



                    <tr>
                        <td>{{ucwords($company->address)}}</td>
                    </tr>





                    <tr>


                        <td>
                            <br>
                            <strong style="font-size:18px;">Email:</strong>
                            <a data-sal="slide-left" data-sal-delay="300" data-sal-duration="800" data-sal-easing="ease" href="mailto:info@rajit.net" class="sal-animate">
                             <span style="color:rgb(132, 101, 96);">
                                {{$company->email}}
                            </span>
                           </a>
                        </td>

                    </tr>



                    <tr>


                        <td>
                            <strong style="font-size:18px;">Mobile:</strong>
                            {{$company->mobile}}
                        </td>

                    </tr>




                    <br>
                    <tr>
                        <td>
                            <br><br>
                            <iframe src="{{$company->location}}" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </td>

                    </tr>
                </table>

            </div>

        </div>

    </div>





</section>






@endsection
