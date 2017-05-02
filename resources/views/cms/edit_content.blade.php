@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">Edit content - </h1>

<div class="row">
  @if($menu)
  <div class="col-md-6">
    <form action="{{ url('cms/content/' . $content['id']) }}" method="POST">
      <input type="hidden" name="_method" value="PUT">
     
       {{ csrf_field() }} 
      
      <div class="form-group">
        <label for="menu">Menu:</label>
         <select name="menu" class="form-control">
           @foreach($menu as $row)
           <option value="{{ $row->id }}">{{ $row->link }}</option>
           @endforeach
         </select>
       </div>
       <div class="form-group">
         <label for="title">Title:</label>
         <input type="text" name="title" value="{{ $content['title'] }}" class="form-control" id="title" placeholder="Title">
       </div>
       <div class="form-group">
         <label for="article">Article:</label>
         <textarea name="article" id="summernote" class="form-control" rows="10">{{ $content['article'] }}</textarea>
       </div>
       <a href="{{ url('cms/content') }}" class="btn btn-default">Cancel</a>
       <button type="submit" class="btn btn-primary">Save Content</button>
    </form>
  </div>
  @else
  <div class="col-md-12">
    <p>No menu item <a href="{{ url('cms/menu/create') }}">Add Menu</a></p>
  </div>
  @endif
</div>
@endsection