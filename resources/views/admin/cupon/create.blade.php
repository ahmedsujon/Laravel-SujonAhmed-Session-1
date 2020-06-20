@extends('layouts.admin')
@section('content')
<section class="wrapper">
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> Add New Cupon</h4>
          <div class="form-panel">
          <form role="form" action="{{ route('cupon.store') }}" method="POST" class="form-horizontal style-form">
            @csrf
            <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Select Product</label>
                <div class="col-lg-6">
                    <select name="product_id" id="product_id" class="form-control browser-default custom-select">
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->title}}</option>
                        @endforeach
                    </select>
                </div>
             </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Cupon Name</label>
                <div class="col-lg-6">
                  <input type="text" name="name" placeholder="" id="name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
@endsection
