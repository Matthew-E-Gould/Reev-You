<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Follow;

class FollowController extends Controller
{

  public function create(Request $request){

    if (Auth::check()){
        $follow = Follow::create(request(['follower_id', 'following_id']));
    }

    $link = '/users/'.strval($request->following_id);

    return redirect()->to($link);

  }

  public function destroy(Request $request){
    if (Auth::check()){
      $follows = Follow::query('follows')
      ->select('*')
      ->where([
        ['following_id', $request->following_id],
        ['follower_id', Auth::user()->id]
        ])
        ->get();
    }

    foreach ($follows as $follow) {
      $follow = Follow::find($follow['id']);
      $follow->delete();
    }

    $link = '/users/'.strval($request->following_id);
    return redirect()->to($link);
  }

}
