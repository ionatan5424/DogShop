@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">Site Orders</h1>

@if($orders)
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <tr>
        <th>User</th>
        <th>Order Details</th>
        <th>Total</th>
        <th>Date</th>
      </tr>
      
      @foreach($orders as $row)
      <tr>
        <td>{{ $row->name }}</td>
        <td>
          <ul>
          @foreach( json_decode($row->data) as $item )
          <li> {{ $item->name }} - , quantity: {{ $item->quantity }}, price: {{ $item->price }}$</li>
          @endforeach
          </ul>
        </td>
        <td>{{ $row->total }}</td>
        <td>{{ $row->ca }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endif

@endsection
