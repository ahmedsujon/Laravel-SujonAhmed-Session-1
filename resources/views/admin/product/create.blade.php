@extends('layouts.admin')
@section('content')
<section class="wrapper">
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> Add Product</h4>
          <div class="form-panel">
          <form role="form" action="{{ route('products.store') }}" method="POST" class="form-horizontal style-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Select Category</label>
                <div class="col-lg-6">
                    <select name="category_id" id="category_id" class="form-control browser-default custom-select">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
             </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Product Name/Title</label>
                <div class="col-lg-6">
                  <input type="text" name="title" id="title" class="form-control">
                </div>
            </div>
            <div class="form-group ">
                <label for="buy_price" class="control-label col-lg-2">Buy price (required)</label>
                <div class="col-lg-6">
                  <input class=" form-control" id="buy_price" name="buy_price" minlength="2" type="number" required="">
                </div>
              </div>

              <div class="form-group ">
                <label for="regular_price" class="control-label col-lg-2">regular price (required)</label>
                <div class="col-lg-6">
                  <input class=" form-control" id="regular_price" name="regular_price" minlength="2" type="number" required="">
                </div>
              </div>
              <div class="form-group ">
                <label for="price" class="control-label col-lg-2"> flat price  (required)</label>

               <div class="col-lg-6">
                  <input class="form-control " id="price" type="number" name="price" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">Product Tags</label>
                <div class="col-lg-6">
                  <input type="text" name="tag" id="tag" class="form-control">
                </div>
            </div>

            <div class="form-group ">
                <label for="product_info" class="control-label col-lg-2">Product Info</label>
                <div class="col-lg-6">
                  <textarea class="form-control " id="product_info" name="product_info" required></textarea>
                </div>
              </div>

              <div class="form-group ">
                <label for="description" class="control-label col-lg-2">Description</label>
                <div class="col-lg-6">
                  <textarea class="form-control " id="description" name="description" required></textarea>
                </div>
              </div>

            <div class="form-group ">
                <label for="image" class="control-label col-lg-2"> Product Image  (required)</label>
                   <div id="input_fields" class="col-lg-6">
                         <input type="file" class="form-control" name="image[]" required>
                   </div>
                <button type="button" onclick="add()" id="addNew" class="mt-md-4 mt-0 mb-2 mb-md-0 btn btn-success">Add More Image</button>
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
  <script>

	function add(){
        let field = `
            <div style="padding-top: 6px;" class="row">
                <div class="col-md-10">
                    <div class="form-group">
                    <input type="file" class="form-control" name="image[]" required>
                    </div>
                </div>
                <div class="col-md-1 col pt-md-2 pt-0">
                    <button type="button" class="remove mt-md-4 mt-0 mb-2 mb-md-0 btn btn-danger"><i class="fa fa-times-circle"></i></button>
                </div>
            </div>
            `;
            $("#input_fields").append(field);
        $(document).on('click', '.remove', function(){
            $(this).parent('.col').parent('.row').remove();
        });
		}
    </script>
@endsection
