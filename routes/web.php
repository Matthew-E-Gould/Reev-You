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

////////////////
// profiles CRUD
Route::post('users/{user}/update', 'UserController@update')->middleware('auth');
Route::get('users/{user}/edit', 'UserController@edit')->middleware('auth');
Route::resource('/users', 'UserController')->except(['edit', 'update']);

////////////////
// registration
Route::get('/register', 'RegistrationController@create'); // takes you to registration form
Route::post('register', 'RegistrationController@store'); // after form

/////////////
// games CRUD
Route::post('/games/save', 'GameController@store')->middleware('auth');
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
