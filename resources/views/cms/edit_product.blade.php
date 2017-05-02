@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">Edit Dog Details</h1>

<div class="row">
  @if($categories)
  <div class="col-md-6">
    <form action="{{ url('cms/products/' . $acquire['id']) }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="$acquire" value="{{ $acquire['id'] }}">
      {{ csrf_field() }} 
      <div class="form-group">
        <label for="categorie_id">Category:</label>
        <select name="categorie_id" class="form-control">
          <option value="">Choose category...</option>
          @foreach($categories as $row)
          <option value="{{ $row->id }}">{{ $row->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $acquire['title'] }}" class="form-control my-source-field" id="title" placeholder="Title">
      </div>
      <div class="form-group">
        <label for="url">Url:</label>
        <input type="text" name="url" value="{{ $acquire['url'] }}" class="form-control my-target-field" id="url" placeholder="Url">
      </div>
      <div class="form-group">
        <label for="article">Article:</label>
        <textarea name="article" id="summernote" class="form-control" rows="10">{{ $acquire['article'] }}</textarea>
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price" value="{{ $acquire['price'] }}" class="form-control" id="price" placeholder="Price">
      </div>
      <div class="form-group">
        <img src="{{ asset('images/' . $acquire['image']) }}" width="80" border="0">
        <br><br>
        <label for="image">Change Image:</label>
        <input name="image" type="file">
      </div>
      <a href="{{ url('cms/products') }}" class="btn btn-default">Cancel</a>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
  @else
  <div class="col-md-12">
    <p>No category item <a href="{{ url('cms/categories/create') }}">Add Category</a></p>
  </div>
  @endif
</div>
@endsection








