
@extends('master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Sign In</h1>
    <p>Sign in with your account -</p> 
  </div>
</div>

<div class="row">
  <div class="col-md-5">
    <form action="" method="POST">
      
      {{ csrf_field() }}

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ Illuminate\Support\Facades\Input::old('email') }}">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
      <a href="#">Forgot your password?</a>
    </form>
  </div>
</div>
@endsection
