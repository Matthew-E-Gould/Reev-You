<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Review;
use App\Rating;
use App\OwnedGame;
use App\Game;
use App\Follow;

class UserController extends Controller
{

  public function index(Request $request) {
    $users = User::query()->paginate(); // padgination
    return view('users/index', compact('users'));
  }

  public function show(Request $request, User $user){
    // getting who the user follows
    $userFollows = Follow::query('follows')
    ->join('users', 'follows.following_id', '=', 'users.id')
    ->select('name', 'img_name', 'following_id')
    ->where('follower_id', $user['id'])
    ->get();

    $following = 0;
    if (Auth::check()){
      if (Auth::user()->id == $user['id']){
        $following = -1;
      }
      else {
        $following = Follow::query('follows')
        ->where([
          ['follower_id', Auth::user()->id],
          ['following_id', $user['id']]
        ])
        ->count();
      }
    }

    $dataSet = [
      'user' => $user,
      'userFollows' => $userFollows,
      'following' => $following
    ];
    //return $userFollows;
    return view('users/show', compact('dataSet'));
  }

  public function create(){
    return view('users/create');
  }

  public function edit(Request $request, User $user){
    if (Auth::user()->id == $user['id']){
      $output = view('users/edit', compact('user'));
    }
    else {
      $output = "You don't have permission";
    }
  return $output;

  }

  public function update(Request $request, User $user){
    $usr = User::find($user->id);

    if($request->hasFile('user_image')){
      $file = $request->file('user_image');
      $extension = $file->getClientOriginalExtension();
      $usr->img_name = 'user/'.strval($usr->id).'.'.$extension;
      Storage::disk('public')->put($usr->img_name,  File::get($file)); // asset(storage)
    }

    $usr->name = $request->name;
    $usr->real_name = $request->real_name;
    $usr->bio = $request->bio;
    $usr->save();
    return redirect()->to('/users');
  }

  public function destroy(Request $request, User $user){
    return "Destroying the profile ".$user."...";
  }

}
