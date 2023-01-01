<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rajIT School</title>
    <link rel = "icon" href="{{asset('images/4WYgORYERneMHCAVLl4s.png')}}"
  type = "image/x-icon">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">



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
    transform: translate(-24px, -50%);
    font-size: 16px;
    }

    .select2-container
    {
        width: 100% !important;
        height: calc(1.5em + 0.85rem + 2px) !important;

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
                <div class="col-md-6 p-4 mt-0">
                    <div class="row justify-content-center p-2">
                        <img src="{{ asset('images/4WYgORYERneMHCAVLl4s.png') }}" alt="" width="70" style="border-radius: 80%;">

                     </div>


                <div class="card">

                    <div class="card-body shadow">


                            <h4 class="text-center" style="color:rgb(56, 142, 142);">Create an account</h4>

                            @if(Session::has('message'))
                            <div class="alert alert-success">
                               {{ session::get('message') }}
                           </div>
                            @endif


                            @if( Session::has("msg") )
                             <script>
                                Swal.fire({
                                  icon: 'success',
                                  title: '{{ Session::get("msg") }}',

                                  })

                             </script>

                            @endif
                     <form action="{{route('saveuser')}}" method="post" enctype="multipart/form-data">
                         @csrf


                         {{-- <div class="row justify-content-start">
                              <div class="col-md-6">
                                <label>CourseCategory</label><span class="text-danger"></span></label>

                              </div>

                         </div>


                         <div class="row form-group justify-content-start">

                              <div class="col-md-12">
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

                         </div> --}}


                           <div class="row  justify-content-start">

                                    <div class="col-md-6">
                                        <label>Name</label><span class="text-danger"></span></label>
                                    </div>

                           </div>



                         <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="text" class="form-control"  name="name" placeholder="Full Name" required>
                                </div>

                         </div>


                         <div class="row form-group justify-content-start">

                              <div class="col-md-6">
                                <label>FatherName</label><span class="text-danger">*</span></label>

                              </div>

                              <div class="col-md-6">
                                <label>MotherName</label><span class="text-danger">*</span></label>

                              </div>

                         </div>


                         <div class="row form-group justify-content-start">
                            <div class="col-md-6">
                                <input type="text" name="f_name" class="form-control" placeholder="Father Name" required>
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="m_name" class="form-control" placeholder="Mother Name" >

                            </div>
                      </div>



                         <div class="row justify-content-start">
                            <div class="col-md-6">
                                <label>DOB</label><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-6">
                                <label>Gender</label><span class="text-danger">*</span></label>

                            </div>
                        </div>


                        <div class="row form-group justify-content-start">
                              <div class="col-md-6">
                                  <input type="date" name="dob" class="form-control" required>
                              </div>

                              <div class="col-md-6">

                                <select name="gender" id="" class="form-control" required>

                                    <option value="">Choose Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>

                              </div>
                        </div>



                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <label>Blood group</label><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-6">
                                <label>Image</label><span class="text-danger">*</span></label>

                            </div>
                        </div>


                        <div class="row form-group justify-content-start">
                              <div class="col-md-6">

                                <select name="b_group" id="" class="form-control" required>
                                    <option value="">Choose Blood Group</option>
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>
                                    <option value="A-">A-</option>
                                    <option value="A+">A+</option>
                                    <option value="B-">B-</option>
                                    <option value="B+">B+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="AB+">AB+</option>
                                </select>


                              </div>

                              <div class="col-md-6">
                                <input type="file" name="file" class="form-control">

                              </div>
                        </div>



                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <label>Academic Qualification Last</label><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-6">
                                <label>Institute</label><span class="text-danger">*</span></label>

                            </div>
                        </div>


                        <div class="row form-group justify-content-start">
                              <div class="col-md-6">
                                <input type="text" name="a_qualification" placeholder="Academic Qualification" class="form-control" required>

                              </div>

                              <div class="col-md-6">
                                <input type="text" name="institute" class="form-control" placeholder="Institute" required>

                              </div>
                        </div>



                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <label>Phone No</label><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-6">
                                <label>Emergency Phone No</label><span class="text-danger">*</span></label>

                            </div>
                        </div>


                        <div class="row form-group justify-content-start">
                              <div class="col-md-6">
                                <input type="text" name="p_no" placeholder="Phone Number" class="form-control" required>

                              </div>

                              <div class="col-md-6">
                                <input type="text" name="e_no"  placeholder="Emergency Number" class="form-control" required>

                              </div>
                        </div>





                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Email address</label><span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-6">
                                    <label>Password</label><span class="text-danger">*</span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-6">

                                    <input type="email" class="form-control"  name="email" placeholder="Email" required>

                                       @error('email')
                                           <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror

                               </div>


                                <div class="col-md-6">

                                        <input type="password" id="password" class="form-control password"  name="password" placeholder="Password" required>
                                        <i class="fa fa-eye-slash"  id="eye"></i>

                                </div>


                            </div>


                            <div class="row justify-content-start">
                                <div class="col-md-6">
                                    <label>Present Address</label><span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-6">
                                    <label>Permanent Address</label><span class="text-danger">*</span></label>

                                </div>
                            </div>


                            <div class="row form-group justify-content-start">
                                  <div class="col-md-6">
                                    <input type="text" name="personal_address" placeholder="Present Address" class="form-control" required>

                                  </div>

                                  <div class="col-md-6">
                                    <input type="text" name="permanent_address"  placeholder="Permanent Address" class="form-control" required>

                                  </div>
                            </div>

                            {{-- <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Course Name</label><span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-6">
                                    <label>Payment System</label><span class="text-danger">*</span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">
                                       @php
                                         $course=App\Models\Course::get();
                                     @endphp

                                <div class="col-md-6">

                                      <select name="course" id="type" class="form-control" required>

                                          <option value="">Select Course</option>





                                      </select>

                               </div>


                                <div class="col-md-6">

                                        <select name="payment" id="" class="form-control" required>
                                            <option value="">Select Payment System</option>

                                            <option value="fullpayment">fullpayment</option>
                                            <option value="installment">installment</option>
                                            <option value="special">special</option>
                                        </select>


                                </div>


                            </div>



                             <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Image</label><span class="text-danger"></span></label>
                                </div>

                                <div class="col-md-6">
                                    <label>Mobile</label><span class="text-danger">*</span></label>
                                </div>

                            </div>

                                <div class="row form-group justify-content-start">

                                    <div class="col-md-6">

                                        <input type="file" class="form-control"  name="file">
                                    </div>


                                    <div class="col-md-6">

                                        <input type="text" class="form-control"  name="mobile" placeholder="Mobile"  required>
                                    </div>


                                </div>


 --}}



                            <div class="row form-group justify-content-center p-2">
                                <div class="col-md-9.5">

                                    <button class="btn btn-success">Register</button>

                                </div>
                            </div>


                     </form>

                            <p class="text-center">Already have an account?

                                <a href="{{route('user.login')}}">Log in</span></a>
                            </p>


                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>




    <script>



        $(document).ready(function () {
            $("#eye").click(function () {


                if ($("#password").attr("type") === "password")
                 {

                    $("#password").attr("type", "text");

                  }
                else
                {
                    $("#password").attr("type", "password");
                }
            });
        });
            </script>


<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>




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

</body>
</html>
