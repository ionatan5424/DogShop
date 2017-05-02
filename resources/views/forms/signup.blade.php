
@extends('master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Sign Up</h1>
    <p>Sign up with your new account here -</p> 
  </div>
</div>


<div class="row">
  <div class="col-md-5">
    <form action="" method="POST">
      
      {{ csrf_field() }}

      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ Illuminate\Support\Facades\Input::old('name') }}">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ Illuminate\Support\Facades\Input::old('email') }}">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
      <a href="{{ url('user/signin') }}">Have an account already? Sign in</a>
    </form>
  </div>
</div>
@endsection


