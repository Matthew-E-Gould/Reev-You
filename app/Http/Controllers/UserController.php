<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use File;

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

    $following = 0;
    if (Auth::check()){ // if logged in
      if (Auth::user()->id == $user['id']){ // if user is veiwing their own page
        $following = -1;
      }
      else {
        $following = Follow::query('follows')
        ->where([
          ['user_id', Auth::user()->id],
          ['following_id', $user['id']]
        ])
        ->count();
      }
    }

    $dataSet = [
      'user' => $user,
      'following' => $following
    ];
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
    
    if($request->user_image){
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
