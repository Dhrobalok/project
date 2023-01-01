
  <div class="row justify-content-start">
      <div class="col-md-6">
          <label for="">User&nbsp;Name</label>

      </div>

  </div>

  <div class="row form-group justify-content-start">

      <div class="col-md-12">
        <input type="text" name="name" value="{{$userall->name}}" class="form-control">

        <input type="hidden" name="id" value="{{$userall->id}}">

      </div>

  </div>



<div class="row justify-content-start">
      <div class="col-md-6">

          <label for="">Present Role</label>

      </div>

  </div>

  <div class="row form-group justify-content-start">

       <div class="col-md-12">

            <input type="text" value="{{$userall->getRoleNames()}}" readonly>

       </div>

  </div>


  <div class="row justify-content-start">
    <div class="col-md-6">

        <label for="">Select Role</label>

    </div>

</div>

@php
    $allrole=App\Models\Role::get();
@endphp

<div class="row form-group justify-content-start">

     <div class="col-md-12">

         <select name="role[]" id="" class="form-control select2" multiple>
            @foreach ($allrole as $role)

               <option value="{{$role->id}}">{{$role->name}}</option>

            @endforeach


         </select>

     </div>

</div>
