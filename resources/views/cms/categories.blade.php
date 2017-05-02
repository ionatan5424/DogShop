@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">Categories</h1>
<p>Here you can edit the site's categories</p>

<div class="row">
  <div class="col-md-12">
    <p><a style="margin-bottom: 35px;"class="btn btn-primary" href="{{ url('cms/categories/create') }}">+ Add New Category</a></p>
    @if($categories)
   
    <table class="table table-bordered">
      <tr>
        <th>Title</th>
        <th>Url</th>
        <th>Image</th>
        <th>Last Update</th>
        <th>Operation</th>
      </tr>
      @foreach($categories as $row)
      <tr>
        <td>{{ $row['title'] }}</td>
        <td><a target="_blank" href="{{ url( 'shop/' . $row['url']) }}">shop/{{ $row['url'] }}</a></td>
        <td><img border="0" width="50" src="{{ asset('images/' . $row['image']) }}"</td>
        <td>{{ $row['updated_at'] }}</td>
        <td>
          <a href="{{ url('cms/categories/' . $row['id'] . '/edit') }}">
            <span class="glyphicon glyphicon-edit">
              Edit
            </span>
          </a> |
          <a href="{{ url('cms/categories/' . $row['id']) }}">
            <span class="glyphicon glyphicon-trash">
              Delete
            </span>
          </a>
        </td>
      </tr>
      @endforeach
    </table>
    @endif
  </div>
</div>
@endsection


