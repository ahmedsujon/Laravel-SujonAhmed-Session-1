@extends('layouts.admin')
@section('content')
<section class="wrapper">
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> Basic Validations</h4>
          <div class="form-panel">
          <form role="form" action="{{route('category.update', $category->id)}}" method="POST" class="form-horizontal style-form">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label class="col-lg-2 control-label">Category Name</label>
                <div class="col-lg-6">
                  <input type="text" name="name" value="{{ $category->name }}" id="f-name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Category Code</label>
                <div class="col-lg-6">
                  <input type="text" name="code" value="{{ $category->code }}" id="f-name" class="form-control">
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
