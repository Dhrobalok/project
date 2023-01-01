


<input type="hidden" value="{{$allpromo->id}}" name="id">
  <div class="row justify-content-start">

    <div class="col-md-6">

        <label for="">Promo Code</label>

    </div>


    <div class="col-md-6">

        <label for="">Discount %</label>

    </div>


</div>


<div class="row form-group justify-content-start">

    <div class="col-md-6">

        <input type="text" name="code" class="form-control" value="{{$allpromo->code}}">

    </div>


    <div class="col-md-6">

        <input type="text" name="discount" class="form-control" value="{{$allpromo->discount}}">

    </div>

</div>




<div class="row justify-content-start">

    <div class="col-md-6">

        <label for="">From</label>

    </div>


    <div class="col-md-6">

        <label for="">To</label>

    </div>


</div>


<div class="row form-group justify-content-start">

    <div class="col-md-6">

        <input type="date" name="from" class="form-control" value="{{$allpromo->from}}">

    </div>


    <div class="col-md-6">

        <input type="date" name="to" class="form-control" value="{{$allpromo->to}}">

    </div>

</div>
