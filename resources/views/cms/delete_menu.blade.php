@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">Are you sure you want to delete this menu?</h1>

<div class="row">
  <div class="col-md-6">
    <form action="{{ url('cms/menu/' . $menu_id) }}" method="POST">
      <input type="hidden" name="_method" value="DELETE">
      <!--below is the Token function that needs to be in all post forms/has input type hidden-->
       {{ csrf_field() }} 
       <a href="{{ url('cms/menu') }}" class="btn btn-default">Cancel</a>
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>
@endsection

