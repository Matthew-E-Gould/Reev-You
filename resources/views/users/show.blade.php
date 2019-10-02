@extends('layouts.app')

@section('content')
<?php
$user = $dataSet['user'];
//$followedUsers = $dataSet['userFollows'];
$following = $dataSet['following'];
?>

<div class="container-fluid row">

<!-- user display card -->
<div class="card col-lg-3 col-sm-12">
  <img src="{{asset('storage/'.strval($user->img_name))}}" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text text-center">{{ $user->name }}</p>

    @if(Auth::check() && $user->id == Auth::user()->id)
      <?php $link = '/users/'.strval(Auth::user()->id).'/edit' ?>
      <button type="button" class="btn btn-success btn-block" onClick="location.href='<?= $link ?>'">Edit Profile</button>
    @elseif($following == 0 && Auth::check())
      <form method="POST" action="/follow/">
        @csrf
        <input type="hidden" value="{{$user->id}}" name="following_id">
        <input type="hidden" value="{{Auth::user()->id}}" name="follower_id">
        <p class="card-text"><button type="submit" class="btn btn-success btn-block">Follow User</button></p>
      </form>
    @elseif($following > 0 && Auth::check())
      <form method="POST" action="/unfollow/">
        @csrf
        <input type="hidden" value="{{$user->id}}" name="following_id">
        <input type="hidden" value="{{Auth::user()->id}}" name="follower_id">
        <p class="card-text"><button type="submit" class="btn btn-danger btn-block">Unfollow User</button></p>
      </form>
    @endif

  </div>
</div>

<!-- profile Bio -->
<div class="card col-lg-6 col-sm-12">
  <div class="card-header">
    <span class="badge badge-warning">Admin</span>
    <span class="badge badge-success">400 Games</span>
    <span class="badge badge-info">Popular Reviewer</span>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>{{ $user->bio }}</p>
    </blockquote>
  </div>
</div>

<!-- follow list -->
<div class="card col-lg-3 col-sm-12">
  <div class="card-header text-center">
    Who {{$user->name}} follows
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      @foreach($user->isFollowing as $follows)
        <?php $followedUser = $follows->following; ?>
        @include('users/followCard')
      @endforeach
    </blockquote>
  </div>
</div>

<!-- formatting of page -->
</div>
<br>
<div class="container-fluid row">

<!-- review showcase -->
<div class="card col-lg-9 col-sm-12">
  <div class="card-header text-center">
    {{$user->name}}'s Review Showcase
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>
        @foreach($user->reviews as $review)
          @include('users/reviewCard')
        @endforeach
      </p>
    </blockquote>
  </div>
</div>

<!-- rated games -->
<div class="card col-lg-3 col-sm-12">
  <div class="card-header text-center">
    {{$user->name}}'s Ratings
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>temp</p>
    </blockquote>
  </div>
</div>

</div>
@endsection
