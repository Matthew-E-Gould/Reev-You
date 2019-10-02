@extends('layouts.app')

@section('content')
<?php
$link = "/users/".strval($user->id)."/update";
?>

<form method="POST" action={{ $link }}>
  {{ csrf_field() }}
  <h1>Edit your profile</h1>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Username</span>
    </div>
    <input type="text" class="form-control" name="name" value={{ $user->name }} required>
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Real Name</span>
    </div>
    <input type="text" class="form-control" name="real_name" value={{ $user->real_name }}>
  </div>

  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Profile Bio</span>
    </div>
    <textarea class="form-control review-content" name="bio">{{ $user->bio }}</textarea>
  </div>

  <br>

  <p>Profile Icon:
  <input type="file" name="user_image" id="user_image" accept="image/*"></p>

  <br>

  <button class="btn btn-success my-2 my-sm-0" type="submit">Update Profile</button>

<form>

@endsection
