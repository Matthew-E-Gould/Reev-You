@extends('layouts.app')

@section('content')

<div class="container-fluid row">
  <div class="card col-lg-3 col-md-12">
    <img src="{{asset('storage/'.strval($review->game->img_name))}}" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">{{ $review->game->title }}</p>
    </div>
  </div>

  <div class="card col-lg-9 col-md-12">
    <div class="card-header">
      {{ $review->heading }}- {{ $review->user->name }}
    </div>
    <div class="card-body">
      <p class="card-text">{{ $review->content }}</p>
    </div>
  </div>
</div>
@endsection
