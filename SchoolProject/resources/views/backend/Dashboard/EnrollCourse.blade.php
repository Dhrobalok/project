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

        @if (session('msg'))
        <div>
        <script>
            alert('Registration Time End')
        </script>
        </div>
        @endif


        @if (session('alarm'))
        <div>
        <script>
            alert('Please choose criteria or promocode')
        </script>
        </div>
        @endif






<div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">

            {{-- <a  href="#" id="addCourse" class="btn btn-sm btn-success"><i class="fa fa-plus p-1" aria-hidden="true">&nbsp;CourseEnroll</i></a> --}}


        </div>





        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100" id="myTable">

                    @php

                        $i=1;
                    @endphp

                  <thead>

                          <th>Id</th>
                          <th>Enroll&nbsp;Course</th>
                          <th>Class&nbsp;Day</th>
                          <th>Class&nbsp;Time</th>
                          <th>Fees</th>

                          {{-- <th>Discount</th> --}}

                          <th>Payment&nbsp;Status</th>
                          <th></th>




                  </thead>

                  @php
                      $i=1;
                  @endphp

                  <tbody>

                    @foreach ($enroll as $enrollall)

                    <tr>

                        <td>{{$i++}}</td>

                        @if ($enrollall->course_id)
                          <td>{{$enrollall->course_id->name}}</td>
                        @else
                           <td>N/A</td>

                        @endif


                           @if ($enrollall->day)

                             <td>{{$enrollall->day}}</td>

                            @else

                               <td>N/a</td>

                           @endif

                           @if ($enrollall->time)

                           <td>{{$enrollall->time}}</td>

                          @else

                             <td>N/a</td>

                         @endif




                            @if ($enrollall->course_id)
                              <td>{{$enrollall->amount}} tk</td>
                            @else
                               <td>N/A</td>

                           @endif

                           @php
                               $discount=App\Models\Discount::where('course_id',$enrollall->course)
                               ->where('user_id',$enrollall->user_id)
                               ->first()
                           @endphp

                           {{-- @if ($discount)

                             <td>{{$discount->discount+$discount->special}}%</td>

                             @else

                             <td>N/a</td>

                           @endif --}}

                        @if ($enrollall->active==0)
                          <td>

                              <a href="{{route('payemntpageuser',$enrollall->id)}}" class="btn btn-sm btn-primary p-2"><i class="fa fa-credit-card" style="font-size:12px">&nbsp;Pay&nbsp;Now</i></a>


                        </td>

                          @else
                            <td>Paid</td>

                          @endif




                          @if ($enrollall->active==1)
                                <td>

                                    <a href="{{route('course.content',$enrollall->course)}}" class="btn btn-sm btn-primary p-2"><i class="fas fa-eye" style="font-size:12px">&nbsp;View&nbsp;Content</i></a>

                                </td>

                                @else

                                <td>N/a</td>

                          @endif












                    </tr>

                    @endforeach







                  </tbody>

                </table>

            </div>


        </div>

    </div>


    </div>

</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
    <span style="color:#8a2be2;">
      Course&nbsp;Enroll

    </span>


    </h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body border shadow">

    <form method="post" action="{{route('Enroll.save')}}">
       @csrf





                    <div class="row justify-content-start">


                        <div class="col-md-6">
                            <label>Course&nbsp;Category</label><span class="text-danger"></span></label>
                        </div>

                        <div class="col-md-6">
                            <label>Course&nbsp;Name</label><span class="text-danger"></span></label>
                        </div>

                    </div>



                    <div class="row form-group justify-content-start">

                        <div class="col-md-6">
                            @php
                               $categoryall=App\Models\Coursecategore::get();
                            @endphp

                            <select name="category" id="category" class="form-control">
                                <option value="">Choose Category</option>
                                    @foreach ($categoryall as $allcategory)
                                        <option value="{{$allcategory->id}}">{{$allcategory->name}}</option>

                                    @endforeach
                            </select>

                        </div>


                        <div class="col-md-6">

                            <select name="course" id="type"  class="form-control" required>

                                <option value="">Select Course</option>



                            </select>

                        </div>






                   </div>









                 <div class="row justify-content-start">


                    <div class="col-md-6">
                        <label>Class Time</label><span class="text-danger"></span></label>
                    </div>


                    <div class="col-md-6">
                        <label>Class Day</label><span class="text-danger"></span></label>
                    </div>



                </div>


                <div class="row form-group justify-content-start">



                  <div class="col-md-6">
                        <select name="time[]" id="time" class="form-control number select2" multiple required>

                            <option value="">Select Time</option>



                        </select>
                  </div>

                  <div class="col-md-6">

                    <select name="day[]" id="day" class="form-control number select2" multiple required>

                        <option value="">Select Day</option>



                    </select>

                  </div>




               </div>











               <div class="row justify-content-start">


                   <div class="col-md-6">
                       <label>Payment Criteria</label><span class="text-danger"></span></label>
                   </div>

               </div>

           <div class="row form-group justify-content-start">

               <div class="col-md-12">

                    <select name="criteria" id="" class="form-control">
                        <option value="">Choose Payment Criteria</option>
                        <option value="regularpayment">Regularpayment</option>
                        <option value="fullpayment">Fullpayment</option>
                        <option value="installment">Installment</option>



                    </select>

               </div>

           </div>



           <div class="row justify-content-start">
            <div class="col-md-6">
                <label for="" style="color: red;">Or Use PromoCode</label>

            </div>

        </div>


        <div class="row justify-content-start">

            <div class="col-md-12">
                <label>Promo Code</label><span class="text-danger"></span></label>

            </div>

        </div>


        <div class="row form-group justify-content-start">

            <div class="col-md-12">
               <input type="text" name="promocode" class="form-control" placeholder="Enter Promo Code">

            </div>



        </div>








       <div class="row justify-content-center mb-1 mt-4">
           <button class="btn btn-primary">Save</button>

       </div>
    </form>
    ...
    </div>

    </div>
    </div>
    </div>







@endsection

@push('js')

<script>
    $('#category').on('change',function(){


   const id = $(this).val();



   $.ajax({


                type:"get",
                 url:"/categoey.id/"+id,

       success:function(res)
       {



                var htmloption="<option value=''>Please Select Option</option>";
                $.each(res,function(){
                        $.each(this,function(k,v){
                            htmloption+="<option value='"+v.id+"'>"+v.name+"</option>";
                        })
                })

                $('#type').html(htmloption);


        //    alert(res.sortprofile) sortdesignation






       }
   });
})
</script>


<script>
    $(document).ready(function (e)
    {

        $(document).on('click','#addCourse',function()
            {

                event.preventDefault();
                jQuery.noConflict();

                $.ajax({



                      success: function(data)
                       {

                        $("#exampleModal").modal('show');
                        // $('#tableContent2').html(data.html);

                       }
               });

            });


    });
 </script>






<script>
     $('#type').on('change',function()
            {



                const id = $(this).val();

                $.ajax({

                    type:"get",
                    url:"/enrollCourse.id/"+id,

                      success: function(res)
                       {



                           var htmloption="<option value=''>Please Select Option</option>";
                            $.each(res,function()
                               {
                                        $.each(this,function(k,v)
                                        {
                                            htmloption+="<option  value='"+v.time+"'> "+v.time+"</option>";
                                        })
                                })

                                $('#time').html(htmloption);

                                var htmloption2="<option value=''>Please Select Option</option>";
                            $.each(res,function()
                               {
                                        $.each(this,function(k,v)
                                        {
                                            htmloption2+="<option  value='"+v.day+"'> "+v.day+"</option>";
                                        })
                                })

                             $('#day').html(htmloption2);







                       }
               });

            });

</script>


{{-- <script>
    $('#b_number').on('change',function()
           {



               const id = $(this).val();
               const courseid = $(this).attr("data-id");






               $.ajax({

                   type:"get",
                   url:"/enrollCourse.batch/"+id,

                     success: function(res)
                      {




                        $('#day').val(res.day);
                        $('#time').val(res.time);



                      }
              });

           });

</script>
 --}}


 <script>


    $(document).ready(function()
     {

        $('.select2').select2();


    });
</script>

@endpush
