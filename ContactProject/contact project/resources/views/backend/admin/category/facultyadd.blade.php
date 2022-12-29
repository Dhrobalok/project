@extends('backend.admin.index')
@section('content')
{{-- <div class="row justify-content-center">
    <div class="col-md-7 py-2">

        <div class="card">


        <div class="card-header py-2">
            <p style="text-align: center;">New Office</p>

        </div>

        <form action="{{ route('newoffice.add') }}" method="post">
            @csrf
            <div class="col-md-12 py-2">
                <label>Office&nbsp;Name<span class = "text-danger">*</span></label>
            </div>
            <div class="col-md-12">

                <input type = "text" class="form-control"  name="deptName" placeholder="Office Name" required>

            </div>

            <div class="col-md-7 py-2">
                <label>Office&nbsp;Code<span class = "text-danger">*</span></label>
            </div>
            <div class="col-md-12">

                <input type ="text" class="form-control"  name="deptCodeOffice" placeholder="Ofice Code" required>

            </div>

            <div class="col-md-7 py-2">
                <label>Office&nbsp;Type<span class = "text-danger">*</span></label>
            </div>

            <div class="col-md-12">

                <input type ="text" class="form-control"  name="unitname" placeholder="Unit Name" required>

            </div>

            <div class="col-md-7 py-2">
                <label>Serial Index<span class = "text-danger">*</span></label>
            </div>

            <div class="col-md-12">

                <input type ="text" class="form-control"  name="serialindex" placeholder="Serial Index" required>

            </div>

              <div class="row justify-content-center py-2">
                <button class="btn btn-primary">Submit</button>

              </div>
        </form>

    </div>
</div>

</div> --}}
<div class="card">

      <div class="text-right p-3">
        <a  id = "decline_btn" href="#" data-target = "#decline" data-toggle = "modal">

                            <button class="btn btn-sm btn-primary" >Add Faculty</button>
                             </a>
      </div>
  <div class="card-body p-4">
  <div class="row justify-content-center">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            @php
                $designation=App\Models\Facult::get();
                $id=Session::get('rollno');
            @endphp
            <thead>
                <tr>
                    <th class="text-center">Sl</th>
                    <th class="text-center">Faculty Name</th>

                    <th class="text-center">Faculty Code</th>


                    <th></th>


                </tr>
            </thead>


            <tbody>
                @foreach ($designation as  $all )


                <tr>
                    <td class="text-center">{{ $all->id }}</td>
                    <td class="text-center">{{ $all->faculty_name }}</td>
                    <td class="text-center">{{ $all->office_code }}</td>

                    @if ($id==2)

                    <td>
                    <a href="{{ url('faculty.delete', ['id' => $all->id]) }}" class="btn btn-sm btn-primary py-2"><i class="fas fa-trash" ></i></a>&nbsp;
                      <a href="{{ url('faculty.edit', ['id' => $all->id]) }}" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit" ></i></a>
                    </td>




                    @else
                    @php
                    $employee_id=Session::get('employeeid');

                    $permission=App\Models\Permission::where('employee_id',$employee_id)->get();

                          $id=Session::get('rollno');
                         //  $status=App\Models\User::where('id',$id)->first();



                   @endphp


                  <td>
                     @foreach ( $permission as  $permission_id )


                        @if($permission_id->permission_Id==4)

                        <a href="{{ url('faculty.delete', ['id' => $all->id]) }}" class="btn btn-sm btn-primary py-2"><i class="fas fa-trash" ></i></a>
                        @endif

                        @if($permission_id->permission_Id==2)

                        <a href="{{ url('faculty.edit', ['id' => $all->id]) }}" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit" ></i></a>
                        @endif



                     @endforeach
                    </td>

                     @endif

                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>

</div>
</div>



<!--  Add  office -->

<div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="col-md-12 py-2">

                <div class="card">


                <div class="card-header py-2">
                    <p style="text-align: center;">New Faculty</p>

                </div>

                <form id="decline_confirm">
                    @csrf
                    <div class="col-md-12 py-2">
                        <label>Faculty&nbsp;Name<span class = "text-danger">*</span></label>
                    </div>
                    <div class="col-md-12">

                        <input type = "text" class="form-control"  name="faculty_name" placeholder="Faculty Name" required>

                    </div>

                    <div class="col-md-7 py-2">
                        <label>Faculty&nbsp;Code<span class = "text-danger">*</span></label>
                    </div>
                    <div class="col-md-12">

                        <input type ="text" class="form-control"  name="office_code" placeholder="Faculty Code" required>

                    </div>



                    <div class="col-md-7 py-2">
                        <label>Department Code<span class = "text-danger">*</span></label>
                    </div>

                    <div class="col-md-12">

                        <input type ="text" class="form-control"  name="depts" placeholder="Department Code" required>

                    </div>

                      <div class="row justify-content-center py-2">
                        <button class="btn btn-primary">Submit</button>

                      </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
<script>
    $('#decline_confirm').on('submit',function(e){

         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url : "{{ url('Add.newfaculty') }}",
            type : "post",
            data:$('#decline_confirm').serialize(),

            success:function(message)
            {
               $('#decline').modal('hide');
               $('#decline_btn').text('Office Save');
            }

        })
    });
</script>
@endpush
