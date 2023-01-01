@php
    $payment=App\Models\Payment::where('id',$id)->first();
@endphp


@if ($payment)

<input type="hidden" name="id" value="{{$payment->id}}">

<div class="row justify-content-start">


    <div class="col-md-6">
        <label>Fullpayment</label><span class="text-danger"></span></label>
    </div>

</div>

  <div class="row form-group justify-content-start">

    <div class="col-md-12">

        <input type="text" name="fullpayment" value="{{$payment->fullpayment}}" id="" class="form-control">

    </div>

</div>



<div class="row justify-content-start">


    <div class="col-md-6">
        <label>Installment</label><span class="text-danger"></span></label>
    </div>

</div>


<div class="row form-group justify-content-start">

    <div class="col-md-12">
        <select name="installment" id="" value="{{$payment->installment}}" class="form-control">

            <option value="">Please Select One</option>

            <option value="1">One Month</option>
            <option value="2">Two Months</option>
            <option value="3">Three Months</option>
            <option value="4">Four Months</option>
            <option value="5">Five Months</option>
            <option value="6">Six Months</option>
            <option value="7">Seven Months</option>
            <option value="8">Eight Months</option>
            <option value="9">Nine Months</option>
            <option value="10">Ten Months</option>
            <option value="11">Eleven Months</option>
            <option value="12">Twelve Months</option>


         </select>

      

    </div>

</div>



<div class="row justify-content-start">


    <div class="col-md-6">
        <label>Special</label><span class="text-danger"></span></label>
    </div>

</div>

<div class="row form-group justify-content-start">

<div class="col-md-12">

    <input type="text" name="special" id="" value="{{$payment->special}}" class="form-control">

</div>

</div>
@endif

