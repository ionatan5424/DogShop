
@extends('master')

@section('content')

<div class="row">
 @if($item)
   <div class="col-md-12">
    <h1>{{ $item['title'] }}</h1>
    <p><img class="item-pics" border="0" width="300" src="{{ asset('images/' . $item['image']) }}"</p>
    <p>{!! $item['article'] !!}</p>
    <p><b>Price on site:</b>{{$item['price'] }}$</p>
    <p>
      <input @if(Cart::get($item['id'])) disabled="disabled" @endif data-id="{{ $item['id'] }}" type="button" class="add-to-cart-btn btn btn-success" value="+Add to Cart">
      <a href="{{ url('shop/checkout') }}" class="btn btn-primary">Checkout</a>
    </p>
   </div>
  @else
  <p><i>no products found</i></p>
  @endif
</div>
@endsection


