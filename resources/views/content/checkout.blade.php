
@extends('master')

@section('content')
<div class="checkout-div">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">Checkout page</h1>
    </div>
  </div>

  <div class='row'>
    <div class="col-md-12">
      @if($cart)

      <table class="table table-bordered">
        <tr>
          <th>Dog:</th>
          <th class="text-center">Quantity:</th>
          <th>Price:</th>
          <th>Sub Total:</th>
        </tr>  
        @foreach($cart as $row)
        <tr>
          <td>{{ $row['name']}}</td>
          <td align="center" class="quantity">
            <input type="button" data-op="minus" data-id="{{ $row['id'] }}" class="update-cart round-button" value="-">
            <input type="text" value="{{ $row['quantity'] }}" size="1" class="text-center">
            <input type="button" data-op="plus" data-id="{{ $row['id'] }}"  class="update-cart round-button" value="+">
          </td>
          <td>{{ $row['price']}}$</td>
          <td>{{ $row['price'] * $row['quantity'] }}$</td>
        </tr>
        @endforeach
        <tr>
          <td><b> Total cost in cart: </b>{{ Cart::getTotal() }}$</td>
          <td></td>
          <td></td>
          <td><a class="checkout-btn btn-default" href="{{ url('shop/cart-clear') }}">Clear Cart</a></td>
        </tr>
      </table> 
      <p class="text-center pOrderNow"><a href="{{ url('shop/order') }}" class="btn-success btn-lg ordernow">Order Now</a></p>
      @else
      <p class='text-center'><i>You have not selected any dogs...</i></p>
      @endif
    </div>
  </div>   
  @endsection