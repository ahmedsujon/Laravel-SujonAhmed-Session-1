@extends('layouts.admin')
@section('content')
<section class="wrapper">
    <div class="row">
    </div>
    <!-- row -->
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"></i> Product Table</h4>
            <hr>
            <thead>
              <tr>
                <th><i class="fa fa-bullhorn"></i> ID</th>
                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                <th><i class="fa fa-bookmark"></i> Code</th>
                <th><i class=" fa fa-edit"></i> Created Time</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach ($products as $product)
              <tr >
                <td>{{$i++}}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->code }}</td>
              <td>{{ $product->created_at }}</td>
              <td>111</td>
              <td>
                <a href="{{ route('product.show', $product->id) }}" class="btn btn-success btn-xs"><span class="fa fa-check"></span></a>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-xs"><span class="fa fa-edit"></span></a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"
                            onclick=" return(confirm('are you sure to delete?'))">
                            Delete
                        </button>
                    </form>
               </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection
