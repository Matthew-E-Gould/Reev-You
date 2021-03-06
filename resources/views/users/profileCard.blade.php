<?php
$link = route("users.show", strval($user->id));
?>

<a href=<?=$link?> class="col-lg-4 col-md-6 a-noDecor">
  <div class="card">
    <div class="row no-gutters">
      <div class="col-md-6">
        <img src="{{asset('storage/'.strval($user->img_name))}}" class="card-img" alt="...">
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title">{{ $user->name }}</h5>
          <p class="card-text">
            Games: {{ $user->games->count() }}<br>
            Ratings: {{ $user->ratedGames->count() }}<br>
            Reviews: {{ $user->reviews->count() }}<br>
          </div>
      </div>
    </div>
  </div>
</a>
