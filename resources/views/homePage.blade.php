@extends('layouts.app')

@section('content')

<br><br><br><br>

<h1 class="text-center">
  Reev-You
</h1>

<br><br>

<h2 class="text-center">
  Your one stop shop for a unique videogame review experience.
</h2>

<br><br><br>

<p class="text-center"><b>
    Explore:
</b></p>

<p class="text-center">
  <div class="text-center">
    <a href="/users">Users</a>
      |
    <a href="/games">Games</a>
      |
    <a href="/reviews">Reviews</a>
      |
    <a href="/ratingDemo">Site Scores</a>
  </div>
</p>

<br><br>

<p class="text-center" id="countDown">Loading Countdown Timer...</p>

<script>
  // Set the date we're counting down to 16/04/2020
  var countDownDate = new Date("Apr 16, 2020 00:00:00").getTime();
  var gameName = "Cyberpunk 2077";

  // Update the count down every 1 second
  var releaseCountdown = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the time between now and the count down date
    var timeLeft = countDownDate - now;

    // Calculations for days, hours, minutes and seconds
    var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    // Output the result in an element with id="countDown"
    document.getElementById("countDown").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s until " + gameName + "'s release.";

      // If the count down is over, say that the game is out
    if (timeLeft < 0) {
      clearInterval(x);
      document.getElementById("countDown").innerHTML = gameName + " is out now!";
    }
  }, 1000);
</script>
@endsection
