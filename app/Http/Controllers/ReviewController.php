<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Game;
use App\User;

class ReviewController extends Controller
{
  public function index(Request $request){
    clock()->startEvent('DB_read', 'DB read'); // starting timer for clockwork

    //$reviews = Review::query()->paginate(100); // padgination
    $reviews = Review::with('user', 'game')
      ->paginate(100); // padgination with multiple eager load

    clock()->endEvent('DB_read'); // ending timer

    return view('reviews/index', compact('reviews'));
  }

  public function show(Request $request, Review $review){
    return view('reviews/show', compact('review'));
  }

  // models as singular form
  // linking data properly
  public function store(){
    $this->validate(request(), [
      'game_id' => '',
      'user_id' => '',
      'heading' => '',
      'content' => '',
      'recommend' => ''
    ]);

    $review = Review::create(request(['game_id', 'user_id', 'heading', 'content', 'recommend']));

    return redirect()
      ->route('reviews.index');
  }

  // creating a review of a specific game
  public function create(Request $request, Game $game){ // dont edit the Games $game
    return view('reviews/create', compact('game'));
  }

  public function edit(Request $request, Review $review){
    if (Auth::check() && Auth::user()->id == $review['user_id']){
      $output = view('reviews/edit', compact('review'));
    }
    else {
      $output = "You don't have permission";
    }
    return $output;
  }

  public function update(Request $request, Review $review){
    $rev = Review::find($review->id);

    $rev->heading = $request->heading;
    $rev->content = $request->content;
    $rev->recommend = $request->recommend;
    $rev->save();

    return redirect()
      ->route('reviews.index');
  }
}
