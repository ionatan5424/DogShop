@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">Add New Dog</h1>

<div class="row">
  @if($categories)
  <div class="col-md-6">
    <form action="{{ url('cms/products') }}" method="POST" enctype="multipart/form-data">
      <!--below is the Token function that needs to be in all post forms/has input type hidden-->

      {{ csrf_field() }} 
      <div class="form-group">
        <label for="categorie_id">Category:</label>
        <?php $pick = Illuminate\Support\Facades\Input::old('categorie_id'); ?> {{--saves previous categories chosen--}}
        <select name="categorie_id" class="form-control">
          <option value="">Choose category...</option>
          @foreach($categories as $row)
          <option @if($pick == $row['id']) selected @endif {{--saves previous categories chosen--}}value="{{ $row['id'] }}">{{ $row['title'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ Illuminate\Support\Facades\Input::old('title') }}" class="form-control my-source-field" id="title" placeholder="Title">
      </div>
      <div class="form-group">
        <label for="url">Url:</label>
        <input type="text" name="url" value="{{ Illuminate\Support\Facades\Input::old('url') }}" class="form-control my-target-field" id="url" placeholder="Url">
      </div>
      <div class="form-group">
        <label for="article">Article:</label>
        <textarea name="article" id="summernote" class="form-control" rows="10">{{ Illuminate\Support\Facades\Input::old('article') }}</textarea>
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price" value="{{ Illuminate\Support\Facades\Input::old('price') }}" class="form-control" id="price" placeholder="Price">
      </div>
      <div class="form-group">
        <label for="image">Dog Image:</label>
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






