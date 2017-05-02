@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">Edit Category</h1>

<div class="row">
  <div class="col-md-6">
    <form action="{{ url('cms/categories/' . $category['id']) }}" method="POST" enctype="multipart/form-data"><!-- without enctype="..." pics will not work-->
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="category_id" value="{{ $category['id'] }}">
       {{ csrf_field() }} 
       <div class="form-group">
         <label for="title">Title:</label>
         <input type="text" name="title" value="{{ $category['title'] }}"class="form-control" id="title" placeholder="Title">
       </div>
       <div class="form-group">
         <label for="url">Url:</label>
         <input type="text" name="url" value="{{ $category['url'] }}" class="form-control my-target-field" id="url" placeholder="URL">
       </div>
       <div class="form-group">
         <label for="article">Article:</label>
         <textarea name="article" id="summernote" class="form-control" rows="10">{{ $category['article'] }}</textarea>
       </div>
       <div class="form-group">
         <img src="{{ asset('images/' . $category['image']) }}" width="80" border="0">
         <br><br>
         <label for="image">Change Image:</label>
         <input name="image" type="file">
       </div>
       <a href="{{ url('cms/categories') }}" class="btn btn-default">Cancel</a>
       <button type="submit" class="btn btn-primary">Save Category</button>
    </form>
  </div>
</div>
@endsection






