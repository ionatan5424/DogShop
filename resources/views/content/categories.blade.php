
@extends('master')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h1 class="text-center">Dogshop Categories</h1>
  </div>
</div>
<div class="row">
  @if($categories)
  @foreach($categories as $row)
  <div class="col-md-4 text-center">
    <h2>{{ $row['title'] }}</h2>
    <a href="{{ url('shop/' . $row['url']) }}">
      <p><img href="{{ url('shop/' . $row['url']) }}" class='cat-pics' border="0" width="250" src="{{ asset('images/' . $row['image'])  }}"</p>
    </a>
    <p>{!! $row['article'] !!}</p>
    <p><a href="{{ url('shop/' . $row['url']) }}" class="btn btn-primary">View More</a></p>
  </div>
  @endforeach
  @else
  <p><i>No categories found...</i></p>
  @endif
</div>
@endsection

