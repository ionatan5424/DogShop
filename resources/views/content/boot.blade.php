
@extends('master')

@section('content')

@if($contents)
@foreach($contents as $row)
  
  <div class="row">
    <div class="col-md-12">
      <h1>{{ $row['title'] }}</h1>
      <!-- the !! is for wysiwyg editor so it doesnt write html enteties-->
      <p>{!!$row['article']!!}</p>  
    </div> 
  </div>
  
  @endforeach
@else

<div class="row">
  <div class="col-md-12">
    <p><i>No contents for this page</i></p>
  </div>
</div>

@endif


@endsection
