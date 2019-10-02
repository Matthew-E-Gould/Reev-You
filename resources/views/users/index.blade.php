@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">{{ $users->links() }}</div>

<div class="row">

@foreach($users as $user)
  @include('users/profileCard')
@endforeach

</div>

<div class="d-flex justify-content-center">{{ $users->links() }}</div>

@endsection
