@extends('layouts.app')

@section('content')
<?php
$game = $dataSet['game'];
$reviewCount = $dataSet['rCount'];
$ownedGame = $dataSet['owned'];
?>

<div class="container-fluid row">

<!-- game cover card -->
<div class="card col-lg-3 col-12">
  <img src="{{asset('storage/'.strval($game->img_name))}}" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text text-center">
      {{$game->title}}
    </p>
    @guest
      <button type="button" class="btn btn-primary btn-block"  onClick="location.href='/login/'">Sign In for options</button>
    @else
      <button type="button" class="btn btn-primary btn-block"  onClick="location.href='<?=$game->id?>/review'">Review Game</button>
        @if($ownedGame)
          <form method="POST" action="/remgame/">
            @csrf
            <input type="hidden" value="{{$game->id}}" name="game_id">
            <input type="hidden" value="{{auth::user()->id}}" name="user_id">
            <button class="btn btn-danger btn-block" type="submit">Remove Game</button>
          </form>
        @else
          <form method="POST" action="/addgame/">
            @csrf
            <input type="hidden" value="{{$game->id}}" name="game_id">
            <input type="hidden" value="{{auth::user()->id}}" name="user_id">
            <button class="btn btn-success btn-block" type="submit">Add Game to Account</button>
          </form>
        @endif
    @endguest
  </div>
</div>

<!-- game info -->
<div class="card col-lg-6 col-sm-12">
  <div class="card-header">
    <span class="badge badge-warning">New Release</span>
    <span class="badge badge-success">XBOX</span>
    <span class="badge badge-danger">NINTENDO</span>
    <span class="badge badge-primary">PLAYSTATION</span>
    <span class="badge badge-dark">PC</span>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>
        Site Rank: ____<br>
        {{ $game->description }}
      </p>
    </blockquote>
  </div>
</div>

<!-- dev/publisher info -->
<div class="card col-lg-3 col-sm-12">
  <div class="card-header text-center">Publication Info</div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </blockquote>
  </div>
</div>

<!-- formatting of page -->
</div>
<br>
<div class="container-fluid row">

<!-- games reviews -->
<div class="card col-12">
  <div class="card-header text-center">
    Site reviews of {{$game->title}} (Total:  {{$reviewCount}})
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      @foreach ($game->review as $review)
        @include('games/reviewCard')
      @endforeach
    </blockquote>
  </div>
</div>


</div>
@endsection
