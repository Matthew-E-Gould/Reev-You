<?php
$link = "games/".strval($game->id);
?>
<style>
.smallImg {
  max-width:50%;
  max-height:50%;
}
</style>

<a href=<?=$link?> class="col-4 a-noDecor">
  <div class="card">
    <div class="card-body row no-gutters">
      <div class="col-6">
        <img src="{{asset('storage/'.strval($game->img_name))}}" class="card-img" alt="...">
        <h5 class="card-title text-center">{{ $game->title }}</h5><br>
      </div>
      <div class="col-6 text-center">
        <h5 class="card-text">Site Rank:</h5>
        <p class="card-text">____</p>
      </div>
    </div>
  </div>
</a>
