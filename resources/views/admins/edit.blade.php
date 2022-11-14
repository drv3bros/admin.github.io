@extends('admins.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('admin/' .$admins->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$admins->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$admins->name}}" class="form-control"></br>
        <label>Image</label></br>
        <input type="file" name="image" id="image" value="{{$admins->image}}" class="form-control"></br>
        <label>Price</label></br>
        <input type="number" name="price" id="price" value="{{$admins->price}}" class="form-control"></br>
        <label>Number</label></br>
        <input type="number" name="number" id="number" value="{{$admins->number}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop