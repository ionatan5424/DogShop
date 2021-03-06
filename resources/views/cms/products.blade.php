@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">Dogs</h1>
<p>Here you can review & edit the dogs on the site</p>

<div class="row">
  <div class="col-md-12">
    <p><a style="margin-bottom: 35px;"class="btn btn-primary" href="{{ url('cms/products/create') }}">+ Add New Dog</a></p>
    @if($acquires)
   
    <table class="table table-bordered">
      <tr>
        <th>Title</th>
        <th>Last Update</th>
        <th>Operation</th>
      </tr>
      @foreach($acquires as $row)
      <tr>
        <td>{{ $row['title'] }}</td>
        <td>{{ $row['updated_at'] }}</td>
        <td>
          <a href="{{ url('cms/products/' . $row['id'] . '/edit') }}">
            <span class="glyphicon glyphicon-edit">
              Edit
            </span>
          </a> |
          <a href="{{ url('cms/products/' . $row['id']) }}">
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



