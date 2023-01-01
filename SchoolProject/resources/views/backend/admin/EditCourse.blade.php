

@extends('backend.Dashboard.AdminDashUser')
@section('content')


        <div class="card shadow p-4 mt-3">

               <div align="center" class="card-header shadow" style="background-color: rgb(196, 144, 241)">
                   <span style="font-size: 18px;color:aliceblue;">Update Course</span>
            </div>

                    <div class="card-body">
                        <form action="{{route('update.course',$course->id)}}" method="post" enctype="multipart/form-data">
                               @csrf

                                    <div class="row justify-content-start">


                                        <div class="col-md-6">
                                            <label>Course&nbsp;Name</label><span class="text-danger"></span></label>
                                        </div>

                                    </div>

                                <div class="row form-group justify-content-start">

                                    <div class="col-md-12">

                                        <input type="text" name="course" id="" value="{{$course->name}}" class="form-control">

                                    </div>

                                </div>



                                <div class="row justify-content-start">


                                    <div class="col-md-6">
                                        <label>Description</label><span class="text-danger"></span></label>
                                    </div>

                                </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="text" name="description" id="" value="{{$course->description}}" class="form-control">

                                </div>

                            </div>



                            <div class="row justify-content-start">


                                <div class="col-md-6">
                                    <label>Duration</label><span class="text-danger"></span></label>
                                </div>

                            </div>

                        <div class="row form-group justify-content-start">

                            <div class="col-md-12">

                                <input type="text" name="duration" id="" value="{{$course->duration}}" class="form-control">

                            </div>

                        </div>



                        <div class="row justify-content-start">


                            <div class="col-md-6">
                                <label>Fees</label><span class="text-danger"></span></label>
                            </div>

                        </div>

                    <div class="row form-group justify-content-start">

                        <div class="col-md-12">

                            <input type="text" name="fees" value="{{$course->fees}}" id="" class="form-control">

                        </div>

                    </div>



                    <div class="row justify-content-start">


                        <div class="col-md-6">
                            <label>Course Image</label><span class="text-danger"></span></label>
                        </div>

                    </div>

                    <div class="row form-group justify-content-start">

                            <div class="col-md-12">

                                <input type="file" name="image"  class="form-control">

                            </div>

                    </div>


                    <div class="row justify-content-center m-10">

                          <button class="btn btn-success">Submit</button>

                    </div>

                                </form>

              </div>



        </div>




@endsection
