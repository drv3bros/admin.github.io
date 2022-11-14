@extends('admins.layout')
@section('content')
<div class="card">
  <div class="card-header">admins Page</div>
  <div class="card-body">
      
      <form action="{{ url('admin') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Image</label></br>
        <input type="file" name="image" id="image" class="form-control"></br>
        <label>Price</label></br>
        <input type="number" name="Price" id="Price" class="form-control"></br>
        <label>Number</label></br>
        <input type="number" name="number" id="number" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop