<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//create a get route /home for landing-page blade
Route::get('/', function () {
    return view('landing-page');
});

//create a prefix route with group for user
Route::prefix('api')->group(function() {
    //create a namespace route for user
    Route::namespace('\App\Services\User\Controllers')->prefix('/user')->group(function() {
        //create a get route / for UserController@getUser
        Route::get('/', 'UserController@getUser');
        //create a post route / for UserController@saveUser
        Route::post('/', 'UserController@saveUser');
        //create a delete route / that contains {id} for UserController@deleteUser
        Route::delete('/{id}', 'UserController@deleteUser');
        //create a put route / that contains {id} and userInfo parameter for UserController@updateUser
        Route::put('/{id}', 'UserController@updateUser');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
