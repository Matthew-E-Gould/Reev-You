@extends('layouts.app')

@section('content')

  <div class="d-flex justify-content-center">{{ $games->links() }}</div>

  <div class="row">

    @foreach ($games as $game)
      @include('games/gameCard')

    @endforeach

  </div>

  <div class="d-flex justify-content-center">{{ $games->links() }}</div>

@endsection
