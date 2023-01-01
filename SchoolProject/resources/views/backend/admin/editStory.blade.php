

@extends('backend.Dashboard.AdminDashUser')
@section('content')


        <div class="card shadow p-4 mt-3">

               <div align="center" >
                   <span style="font-size: 18px;color:rgb(12, 13, 13);">Update Story</span>
               </div>

               <div align="right" >

                <a class="btn btn-primary btn-sm" id = "decline_btn"
                href="{{route('SuccessStory')}}"><i class="fas fa-arrow-circle-left"></i>
                Back</a>

            </div>

                    <div class="card-body">
                        <form action="{{route('update.story')}}" method="post" enctype="multipart/form-data">
                               @csrf

                                    <div class="row justify-content-start">

                                        <input type="hidden" name="id" value="{{$story->id}}">

                                        <div class="col-md-6">
                                            <label>Name</label><span class="text-danger"></span></label>
                                        </div>

                                    </div>

                                <div class="row form-group justify-content-start">

                                    <div class="col-md-12">

                                        <input type="text" name="name" id="" value="{{$story->name}}" class="form-control">

                                    </div>

                                </div>



                                <div class="row justify-content-start">


                                    <div class="col-md-6">
                                        <label>Description</label><span class="text-danger"></span></label>
                                    </div>

                                </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                      <textarea name="description" id="" cols="30" rows="3" class="form-control">

                                        {{$story->description}}
                                      </textarea>

                                </div>

                            </div>



                            <div class="row justify-content-start">


                                <div class="col-md-6">
                                    <label>Image</label><span class="text-danger"></span></label>
                                </div>

                            </div>

                        <div class="row form-group justify-content-start">

                            <div class="col-md-12">

                                <input type="file" name="image" class="form-control">

                            </div>

                        </div>




                    <div class="row justify-content-center m-10">

                          <button class="btn btn-success">Submit</button>

                    </div>

                                </form>

              </div>



        </div>




@endsection
