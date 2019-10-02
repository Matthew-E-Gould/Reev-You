<?php $link="/users/".strval($review['user_id']) ?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{$review->heading}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">by {{$review->user->name}}</h6>
    <p class="card-text">{{$review->content}}</p>
    <a href=<?=$link?> class="card-link">{{$review->user->name}}'s profile</a>
  </div>
</div>
<br>
