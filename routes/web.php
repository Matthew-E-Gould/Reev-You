<?php


  //////    //      //    //////
//////////  ////  ////  //////////
//      //  //  //  //  //      //
//      //  //      //  //
//      //  //      //  //    ////
//      //  //      //  //      //
//////////  //      //  //////////
  //////    //      //    //////

//////////////////////////////////

//////////////////////////////////





         ####        ####
         ####        ####

         #              #
         ##            ##
          ####      ####
           ############


##      ##  ##      ##  ##      ##
##      ##  ##      ##  ##      ##
##      ##  ##      ##    ##  ##
##      ##  ##########      ##
##      ##  ##########      ##
##  ##  ##  ##      ##      ##
####  ####  ##      ##      ##
##      ##  ##      ##      ##


  ########    ######
##          ###    ###
##          ##      ##
########    ##      ##
  ########  ##      ##
        ##  ##      ##
        ##  ###    ###
########      ######


  ########  ##########  ########    ##########    ######    ##      ##    ########
##          ##########  ##      ##      ##      ###    ###  ##      ##  ##
##          ##          ##      ##      ##      ##      ##  ##      ##  ##
########    ########    ########        ##      ##      ##  ##      ##  #########
  ########  ########    ####            ##      ##      ##  ##      ##   #########
        ##  ##          ##  ##          ##      ##      ##  ##      ##          ##
        ##  ##########  ##    ##        ##      ###    ###  ###    ###          ##
########    ##########  ##      ##  ##########    ######      ######    ########

Route::get('/', function () {
    return view('homePage');
});

/////////////
// users CRUD
Route::get('users', 'UserController@index')
  ->name('users.index');

Route::get('users/create', 'UserController@create')
  ->name('users.create');

Route::get('users/{user}', 'UserController@show')
  ->name('users.show');

Route::get('users/{user}/edit', 'UserController@edit')
  ->middleware('auth')
  ->name('users.edit');

Route::post('users/{user}/update', 'UserController@update')
  ->middleware('auth')
  ->name('users.update');

//destroy

////////////////
// registration
Route::get('/register', 'RegistrationController@create') // takes you to registration form
  ->name('register.create');

Route::post('register', 'RegistrationController@store') // after form
  ->name('register.store');

/////////////
// games CRUD

Route::get('/games', 'GameController@index')
  ->name('games.index');

Route::get('/games/{game}', 'GameController@show')
  ->name('games.show');

Route::post('/games/save', 'GameController@store')
  ->middleware('auth')
  ->name('games.store');

Route::get('/games/create', 'GameController@create')
  ->middleware('auth')
  ->name('games.create');

//edit
//update
//destroy

///////////////
// reviews CRUD
Route::get('/games', 'ReviewController@index')
  ->name('games.index');

Route::get('/review/{game}', 'ReviewController@show') // takes you to review form
  ->name('games.show');

Route::get('/games/{game}/review', 'ReviewController@create') // takes you to review form
  ->middleware('auth')
  ->name('reviews.create');

Route::post('review/save', 'ReviewController@store') // after form
  ->middleware('auth')
  ->name('reviews.store');

Route::post('reviews/{review}/update', 'ReviewController@update')
  ->middleware('auth')
  ->name('reviews.update');

//index
//store
//update
//create
//show

//edit
//destroy

/////////////////
// Owned games CR
Route::post('addgame/', 'OwnerController@create')
  ->middleware('auth')
  ->name('owner.create');

Route::post('remgame/', 'OwnerController@destroy')
  ->middleware('auth')
  ->name('owner.destroy');

/////////////
// Follows CR
Route::post('follow/', 'FollowController@create')
  ->middleware('auth')
  ->name('follow.create');

Route::post('unfollow/', 'FollowController@destroy')
  ->middleware('auth')
  ->name('follow.destroy');

/////////////////
// Authentication
Auth::routes();

////////////////
// Homepage Show
Route::get('/', 'HomeController@index')
  ->name('home');

//////////
// ratings
Route::get('/ratingDemo', 'RatingController@demo')
  ->name('demo');
