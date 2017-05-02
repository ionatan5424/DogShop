
@extends('master')

@section('content')

@if(isset($cat_title))

<div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6">
          <button id="asc" class="AscButton pull-left">
            <a class="number" style="text-decoration: none;">Lowest Price</a>
          </button>
      </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <button id="desc" class="descButton pull-right">
          <a class="number" style="text-decoration: none;">Highest Price</a>
          </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      <h1 style="color: darksalmon;" class="text-center">{{ $cat_title }}</h1>
    </div>
  </div>
@endif

<div class="container-fluid">
  
  @if($acquires)

  <div class="row grid">
      @foreach($acquires as $row) 
      <div class="grid-item col-md-4 col-xs-12">
          <h2>{{ $row['title'] }}</h2>
          <p><img class="acquires-pics inline" border="0" src="{{ asset('images/' . $row['image']) }}"</p>
          <p>{!! $row['article'] !!}</p>
          <p><b>Price on site:</b>
              <span class="number">{{$row['price'] }}</span>$
          </p>

          <p>
              <input @if(Cart::get($row['id'])) disabled="disabled" @endif data-id="{{ $row['id'] }}" type="button" class="add-to-cart-btn btn btn-success" value="+Add to Cart">
              <a href="{{ url('shop/' . $cat_url . '/' . $row['url']) }}" class="btn btn-primary">View details</a>
          </p>
      </div> 
      @endforeach
  </div>

  
</div>
  @else
  <p><i> Best friend has not been selected yet...</i></p>
  @endif
</div>
@endsection
