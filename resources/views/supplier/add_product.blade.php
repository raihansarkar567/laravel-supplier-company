@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- form start --}}

                    <form class="well form-horizontal" action="{{route('add_product.submit')}}" method="post"  id="product_form">
                        {{csrf_field()}}
                        <fieldset>

                            <!-- Form Name -->

                            <!-- Text input-->

                            <div class="form-group">
                              <label class="col-md-4 control-label">Business ID</label>  
                              <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                  <input  name="bus_id" placeholder="business_id" class="form-control"  type="text" value="{{Auth::id()}}" readonly>
                              </div>
                          </div>
                      </div>

                      <!-- Text input-->

                      <div class="form-group">
                          <label class="col-md-4 control-label">Product Title</label>  
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                              <input  name="product_title" placeholder="job Name" class="form-control"  type="text">
                          </div>
                      </div>
                  </div>

                  
                  <!-- Text input-->

                  <div class="form-group">
                      <label class="col-md-4 control-label">Product Description</label>  
                      <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                          <input  name="product_des" placeholder="Job Description" class="form-control"  type="text">
                      </div>
                  </div>
              </div>

              <!-- Text input-->

              <div class="form-group">
                  <label class="col-md-4 control-label" >Cost</label> 
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <input name="cost" placeholder="Cost" class="form-control"  type="number">
                  </div>
              </div>
          </div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    <button type="submit" class="btn btn-warning" >Submit</button>
</div>
</div>

</fieldset>
</form>

{{-- form end --}}

</div>
</div>
</div>
</div>
</div>
@endsection
