<div class="card">
  <div class="card-body row no-gutters">
    <div class="col-3">
      <img src="{{asset('storage/'.strval($review->img_name))}}" class="card-img" alt="...">
      <h5 class="card-title text-center">{{ $review->title }}</h5><br>
    </div>
    <div class="col-9 text-center">
      <p class="card-text"><u>{{ $review->heading }}</u></p>
      <p class="card-text">{{ $review->content }}</p>
    </div>
  </div>
</div>
