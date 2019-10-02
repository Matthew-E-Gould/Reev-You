@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">{{ $reviews->links() }}</div>

<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Game</th>
      <th scope="col">Reviewer</th>
      <th scope="col">Title</th>
      <th scope="col">Stats</th>
    </tr>
  </thead>

  <tbody>
    @foreach($reviews as $review)
    <?php $link = "/reviews/".strval($review->id) ?>
      <tr>
        <th scope="row"><a href={{$link}}>{{ $review->game->title }}</a></th>
        <td><a href={{$link}}>{{ $review->user->name }}</a></td>
        <td><a href={{$link}}>{{ $review->heading }}</a></td>
        <td><a href={{$link}}>
          <?php
          if ($review->recommend) echo "Positive Review";
          else echo "Negative Review";
          ?>
           | likes, dislikes
        </a></td>
      </tr>
    @endforeach
  </tbody>

</table>

<div class="d-flex justify-content-center">{{ $reviews->links() }}</div>

@endsection
