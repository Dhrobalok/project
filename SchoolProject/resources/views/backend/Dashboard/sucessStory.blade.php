<div class="row justify-content-center" >
    <div class="col-md-12">



            <div class="pt-2 p-4 row justify-content-center" id="Avatar">
                <img src="{{URL::to($story->image)}}" style="width: 100px;height: 90px;border-radius: 50%;">

             </div>

              <div class="row p-4">


               <div class="col-md-12 row justify-content-center">
                    <p  style="font-family: sans-serif;">


                       @php
                           $length=Str::length($story->description);
                       @endphp




                         <span style="font-weight:bold;font-size:15px;">"</span>
                               {{$story->description}}
                               {{-- {{ substr( $story->description, 0, random_int(60, 150)) }} --}}

                               <span style="font-weight:bold;font-size:22px;">"</span>

                      <h5 class="p-4" align="right" style="font-weight: bold;">{{ucwords($story->name)}}</h5>
                   </p>

               </div>

              </div>


        </div>

   </div>


  </div>
