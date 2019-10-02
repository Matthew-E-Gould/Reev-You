@extends('layouts.app')

@section('content')

<style>
.review-content {
  min-height: 110px
}
</style>
<form method="POST" action="/games/save" enctype="multipart/form-data">
  @csrf
  <h1>Submit Game Information</h1>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Game Title</span>
    </div>
    <input type="text" class="form-control" name="title" required>
  </div>

  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Game Description</span>
    </div>
    <textarea class="form-control review-content" name="description" required></textarea>
  </div>

  <br>

  <p>Upload Game Cover:
  <input type="file" name="game_image" id="game_image" accept="image/*"></p>

  <br><br>

  <button class="btn btn-success my-2 my-sm-0" type="submit">Submit Game</button>
</form>
@endsection
