@extends('layouts.app')

@section('content')

<div class="container-fluid row" id="app">

  <div class="card col-lg-3 col-md-12">
    <img src="{{asset('storage/'.strval($review->game->img_name))}}" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">@{{ review.game.title }}</p>
    </div>
  </div>

  <div class="card col-lg-9 col-md-12">
    <div class="card-header">
      @{{ review.heading }} by {{ $review->user->name }}
  <!-- I understand that {{$review->user->name}} should be @{{review.user.name}} but it wont work :( -->
    </div>
    <div class="card-body">
      <p class="card-text">@{{ review.content }}</p>
    </div>
  </div>
</div>
@endsection


@section('vue-js')
<script>
	var app = new Vue({
  	el: '#app',
  	data: {
    	review: {!! $review !!}
  	},
		computed: {},
		methods: {}
	})
</script>
@endsection
