<?php
  $link = "/users/".strval($followedUser->following_id);
?>

<a href={{$link}}>
  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{asset('storage/'.strval($followedUser->img_name))}}" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <p class="card-text">{{$followedUser->name}}</p>
        </div>
      </div>
    </div>
  </div>
</a>
