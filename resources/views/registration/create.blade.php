@extends('layouts.app')

@section('content')

<h1>Please fill out the following information :)</h1>

<form method="POST" action="{{ route('register') }}">
  {{ csrf_field() }}
  <div class="input-group mb-3 col-5">
    <div class="input-group-prepend">
      <span class="input-group-text">Username</span>
    </div>
    <input type="text" class="form-control" placeholder="Username (non unique)" id="name" name="name" required>
  </div>

  <div class="input-group mb-3 col-5">
    <div class="input-group-prepend">
      <span class="input-group-text">Email</span>
    </div>
    <input type="email" class="form-control" placeholder="email@address.ty" id="email" name="email" required>
  </div>

  <div class="input-group mb-3 col-5">
    <div class="input-group-prepend">
      <span class="input-group-text">Password</span>
    </div>
    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
  </div>

  <div class="input-group mb-3 col-5">
    <div class="input-group-prepend">
      <span class="input-group-text">Confirm Password</span>
    </div>
    <input type="password" class="form-control" placeholder="Password (again)" id="password-confirm" required>
  </div>

  <div class="input-group mb-3 col-5">
    <div class="input-group-prepend">
      <span class="input-group-text">Real Name</span>
    </div>
    <input type="text" class="form-control" placeholder="Not Required" id="real_name" name="real_name">
  </div>

  <button class="btn btn-success my-2 my-sm-0" type="submit">SUBMIT</button>
</form>

@endsection
