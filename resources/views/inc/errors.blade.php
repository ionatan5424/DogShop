@if(isset($errors))
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-danger" role='alert'>
      <ul>
        @foreach($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
      </ul>
    </div>
  </div>  
</div>
@endif

