<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OwnedGame;

class OwnerController extends Controller
{
  public function create(Request $request){

    $this->validate(request(), [
      'game_id' => 'required',
      'user_id' => 'required'
    ]);
    $review = OwnedGame::create(request(['game_id', 'user_id']));
    $link = "/games/".strval($request->game_id);
    return redirect()->to($link);
  }

  public function destroy(Request $request){

    $owns = OwnedGame::query('owned_games')
    ->select('*')
    ->where([
      ['game_id', $request->game_id],
      ['user_id', $request->user_id]
    ])
    ->get();

    foreach ($owns as $owned) {
      $owned = OwnedGame::find($owned['id']);
      $owned->delete();
    }

    $link = "/games/".strval($request->game_id);
    return redirect()->to($link);

  }
}
