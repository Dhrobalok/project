<div class="row justify-content-start">

    <div class="col-md-6">

        <label for="">Choose Time</label>

    </div>

    <div class="col-md-6">

        <label for="">Choose Day</label>

    </div>

</div>


<div class="row form-group justify-content-start">
    <div class="col-md-6">

        <select  class="js-example-basic-multiple" name="state" multiple="multiple">
            <option value="AL">Alabama</option>
              ...
            <option value="WY">Wyoming</option>
          </select>

        {{-- <select name="time"  class="form-control" id="select2insidemodal" multiple="multiple">
           <option value="">Choose Time</option>

           @foreach ($batchall as $time)

               <option value="{{$time->time}}">{{$time->time}}</option>

           @endforeach

        </select> --}}

    </div>


    <input type="hidden" name="userid" value="{{$userid}}">
    <input type="hidden" name="courseid" value="{{$course_id}}">

    <div class="col-md-6">

        <select name="time" id="" class="form-control">
           <option value="">Choose Day</option>

           @foreach ($batchall as $day)

               <option value="{{$day->day}}">{{$day->day}}</option>

           @endforeach

        </select>

    </div>

</div>




<div>
    <span>Or</span>
</div>


<div class="row justify-content-start">

    <div class="col-md-5">

        <label for="">Enter Time</label>

    </div>

    <div class="col-md-7">

        <label for="">Enter Day</label>

    </div>

</div>


<div class="row form-group justify-content-start">
    <div class="col-md-5">

        <input type="text" name="time" class="form-control">

    </div>



    <div class="col-md-7">

        <table class="table table-borderless" >



            <tr>

                <td>


                    <input type="checkbox" class="days" name='day[]' value="Sat"/>Sat
                    <input type="checkbox" class="days" name='day[]' value="Sun"/>Sun
                    <input type="checkbox" class="days" name='day[]' value="Mon"/>Mon
                    <input type="checkbox" class="days" name='day[]' value="Tues"/>Tues
                    <input type="checkbox" class="days" name='day[]' value="Wed"/>Wed
                    <input type="checkbox" class="days" name='day[]' value="Thur"/>Thur
                    <input type="checkbox" class="days" name='day[]' value="Fri"/>Fri

                    </div>



                </td>





            </tr>









        </table>




    </div>

</div>
