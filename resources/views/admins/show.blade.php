@extends('admins.layout')
@section('content')
<div class="card">
  <div class="card-header">admins Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Name : {{ $admins->name }}</h5>
        <p class="card-text">Image : {{ $admins->image }}</p>
        <p class="card-text">Price : {{ $admins->price }}</p>
        <p class="card-text">Number : {{ $admins->number }}</p>
  </div>
      
    </hr>
  
  </div>
</div>