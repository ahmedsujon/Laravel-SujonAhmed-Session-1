@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <div class="order-summary clearfix">
        <div class="section-title">
            <h3 class="title">Order Review</h3>
        </div>
        <table class="shopping-cart-table table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th></th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0 ?>
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>
                    <td class="thumb"><img src="{{ $details['image'] }}" alt=""></td>
                    <td class="details">
                        <a href="#">{{ $details['title'] }}</a>
                        <ul>
                            <li><span>Size: XL</span></li>
                            <li><span>Color: Camelot</span></li>
                        </ul>
                    </td>
                    <td class="price text-center"><strong>{{ $details['price'] }}</strong><br><del class="font-weak"><small>{{ $details['regular_price'] }}</small></del></td>
                    <td class="qty text-center">
                        <input type="number" value="{{ $details['quantity'] }}" class="input" />
                    </td>
                    <td class="total text-center"><strong class="primary-color">{{ $details['price'] * $details['quantity'] }}</strong></td>
                    <td class="text-right"><button class="main-btn icon-btn" data-id="{{ $id }}"><i class="fa fa-close"></i></button></td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>SUBTOTAL</th>
                    <th colspan="2" class="sub-total">{{ $total }}</th>
                </tr>
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>SHIPING</th>
                    <td colspan="2">Free Shipping</td>
                </tr>
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>TOTAL</th>
                    <th colspan="2" class="total">{{ $total }}</th>
                </tr>
            </tfoot>
        </table>
        <div class="pull-right">
            <button class="primary-btn">Place Order</button>
        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript">

    $(".update-cart").click(function (e) {
       e.preventDefault();

       var ele = $(this);

        $.ajax({
           url: '{{ url('update-cart') }}',
           method: "patch",
           data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
           success: function (response) {
               window.location.reload();
           }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
