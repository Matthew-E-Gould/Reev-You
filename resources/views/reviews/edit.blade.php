@extends('layouts.app')

@section('content')
<?php
$link = "/reviews/".strval($review->id)."/update";
?>

<style>
.review-content {
  min-height: 110px
}
</style>

<form method="POST" action={{ $link }}>
  {{ csrf_field() }}
  <h1>Edit your review for {{ $review->game->title }}</h1>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Review Title</span>
    </div>
    <input type="text" class="form-control" name="heading" value={{ $review->heading }} required>
  </div>

  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Review Content</span>
    </div>
    <textarea class="form-control review-content" name="content" required>{{ $review->content }}</textarea>
  </div>

  <br>

  <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-success active">
      <input type="radio" name="recommend" value="1" autocomplete="off" checked> I Recommend
    </label>
    <label class="btn btn-danger">
      <input type="radio" name="recommend" value="0" autocomplete="off"> I Dont Recommend
    </label>
  </div>

  <br><br>

  <button class="btn btn-success my-2 my-sm-0" type="submit">Submit Review</button>
</form>
@endsection
