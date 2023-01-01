



@php
    $i=1;
@endphp


                @foreach ($allbatch as $batch)

                        <tr>

                            <td>{{$i++}}</td>
                               @if ($batch->s_name)
                                 <td>{{$batch->s_name->name}}</td>

                                 @else

                                 <td>N/A</td>

                               @endif


                               @if ($batch->course_id)
                               <td>{{$batch->course_id->name}}</td>

                               @else

                               <td>N/A</td>

                             @endif

                             @if ($batch->active==0)

                               <td><span style="color:red;">Due</span></td>


                               @else

                               <td><span style="color:green;">Pay</span></td>



                             @endif



                        </tr>



                @endforeach










