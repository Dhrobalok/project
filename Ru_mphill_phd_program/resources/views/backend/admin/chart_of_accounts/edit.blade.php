@extends('backend.admin.index')

@section('content')
<!-- Page Content -->
<div class="content">


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title">Update Chart Of Account</h3>
            <a class="btn btn-primary f-100" href="{{ route('accounts.index') }}"><i class = "fa fa-angle-left mr-2"></i>Back</a>
        </div>

        <form id="accounts_form_create" action="{{ route('accounts.update',['account' => $account -> id]) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Account Name<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type = "text" class="form-control" id="name" name="name" value = "{{ old('name',$account -> name) }}">
                    @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Description<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <textarea class="form-control" id="description" name="description">{{ old('description',$account -> description) }}</textarea>
                    @if($errors -> any('description') && !old('description'))
                      <strong class = "text-danger f-100">Description field can not be empty</strong>
                    @endif
                </div>
            </div>
            
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>General Code<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="general_code" name="general_code" value = "{{ old('general_code',$account -> general_code) }}">
                    @if($errors -> any('general_code') && !old('general_code'))
                      <strong class = "text-danger f-100">Account has must be a code.</strong>
                    @endif
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Company Code</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="company_code" name="company_code" value = "{{ old('company_code',$account -> company_code) }}">
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Account Type<span class = "text-danger">*</span></label>
                    
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="category" name="category">

                       @foreach($categories as $category)
                       
                        @if($category -> id == $account -> category_id)
                         <option value = "{{ $category  -> id }}" selected>{{ $category -> category_name }}</option>
                        @else
                        <option value = "{{ $category  -> id }}">{{ $category -> category_name }}</option>
                        @endif
                       @endforeach
                    </select>
                </div>
            </div>
           

            <div class="row form-group justify-content-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button type="submit" class="form-control btn btn-primary">Save Changes</button>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>
<!-- END Page Content -->

@endsection