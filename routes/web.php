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
//Show
//edit
//update
//destroy


Route::resource('/games', 'GameController');

///////////////
// reviews CRUD
Route::get('/games/{game}/review', 'ReviewController@create')->middleware('auth'); // takes you to review form
Route::post('review/save', 'ReviewController@store')->middleware('auth'); // after form
Route::post('reviews/{review}/update', 'ReviewController@update')->middleware('auth');
Route::resource('/reviews', 'ReviewController');

/////////////////
// Owned games CR
Route::post('addgame/', 'OwnerController@create')->middleware('auth');
Route::post('remgame/', 'OwnerController@destroy')->middleware('auth');

/////////////
// Follows CR
Route::post('follow/', 'FollowController@create');
Route::post('unfollow/', 'FollowController@destroy');

/////////////////
// Authentication
Auth::routes();

////////////////
// Homepage Show
Route::get('/home', 'HomeController@index')->name('home');

//////////
// ratings
Route::get('/ratingDemo', 'RatingController@demo');
