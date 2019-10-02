<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use File;

use App\Game;
use App\Review;
use App\User;
use App\OwnedGame;

class GameController extends Controller
{
  public function index(Request $request){
    $games = Game::query()->paginate(); // padgination
    return view('games/index', compact('games'));
  }

  public function show(Request $request, Game $game){

    // working out how many reviews there are for the
    $reviewCount = Review::query('reviews')
    ->where('game_id', $game['id'])
    ->count();

    // working out if the current user owns the game or not
    $owned = 0;
    if (Auth::check()) {
      $owned = OwnedGame::query('owned_games')
      ->select('id')
      ->where([
        ['game_id', $game['id']],
        ['user_id', Auth::user()->id]
        ])
      ->count();
    }

    // creating a dataset for the webpage
    $dataSet = [
      'game' => $game,
      'rCount' => $reviewCount,
      'owned' => $owned
    ];

    //return $dataSet;
    return view('games/show', compact('dataSet'));
  }

  public function edit(Request $request, Game $game){
    return "Editing the game ".$game."...";
  }

  public function update(Request $request, Game $game){
    return "Updating the game ".$game."...";
  }

  public function destroy(Request $request, Game $game){
    return "Destroying the game ".$game."...";
  }

  public function store(Request $request){
    // get files from form and make sure they are what we want
    $this->validate(request(), [
      'title' => '',
      'description' => ''
    ]);
    // store gethered data to database and create copy of the data
    $game = Game::create(request(['title', 'description']));
    // see if the user has uploaded a file inthe form
    if($request->hasFile('game_image')){
      $file = $request->file('game_image'); // get the file
      $extension = $file->getClientOriginalExtension(); // get the extension of the file (.png, .gif, .jpeg)
      $game->img_name = 'game/'.strval($game->id).'.'.$extension; // creating the new image name based off the PK of the game and the file extension
      Storage::disk('public')->put($game->img_name,  File::get($file)); // storing image to "public/storage/game/<filename>"
      $game->save(); // saving filename to database
    }
    return redirect()->to('/games');
  }

  public function create(Request $request, Game $game){
    return view('games/new', compact('game'));
    //return $request->game_image;
  }
}
