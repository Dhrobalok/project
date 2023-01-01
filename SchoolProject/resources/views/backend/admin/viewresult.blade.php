
@php
    $day=\Carbon\Carbon::now();
    $year=$day->year;
    $i=1;


@endphp


<div class="text-right">

    <a  href="{{route('downlod.result',$id)}}">Download</a>

</div>


   <table class="table table-hover">

       <thead>

           <tr>
              <th>SL</th>

              <th>Roll</th>
              <th>Name</th>
              <th>Marks</th>
               <th>Position</th>
              <th>Msg</th>

           </tr>
       </thead>

       <tbody>

        @foreach ($allresult as $result)

          <tr>

              <td>{{$i++}}</td>
              <td>{{$result->s_id}}</td>
              @if ($result->student_name)

                 <td>{{$result->student_name->name}}</td>

                 @else

                 <td>N/A</td>

              @endif

              <td>{{$result->mark}}</td>



              @if ($result->mark==$isetposition)

              <td>1st Position</td>

              @else

              <td>--</td>


            @endif

              <td><span><i class="fas fa-check" style="color:rgb(146, 86, 86)"></i></span></td>

          </tr>

          @endforeach

       </tbody>

   </table>


