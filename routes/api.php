<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/newapi', 'MoviesCotroller@index');

// Auth
Route::post('/login','AuthController@login');
Route::post('/signup', 'AuthController@signup');

// Movies
Route::post('/movies','api\MoviesController@create')->middleware('auth:api');
Route::get('/movies','api\MoviesController@read')->middleware('auth:api');
Route::put('/movies/{id}','api\MoviesController@update')->middleware('auth:api');
Route::delete('/movies/{id}','api\MoviesController@delete')->middleware('auth:api');

// Categories
Route::post('/categories','api\CategoriesController@create')->middleware('auth:api');
Route::get('/categories','api\CategoriesController@read')->middleware('auth:api');
Route::put('/categories/{id}','api\CategoriesController@update')->middleware('auth:api');
Route::delete('/categories/{id}','api\CategoriesController@delete')->middleware('auth:api');

// Category Movies
Route::post('/category/movies','api\CategoryMoviesController@create')->middleware('auth:api');
Route::get('/category/movies','api\CategoryMoviesController@read')->middleware('auth:api');
Route::put('/category/movies/{id}','api\CategoryMoviesController@update')->middleware('auth:api');
Route::delete('/category/movies/{id}','api\CategoryMoviesController@delete')->middleware('auth:api');

// Rentals
Route::post('/rentals','api\RentalsController@create')->middleware('auth:api');
Route::get('/rentals','api\RentalsController@read')->middleware('auth:api');
Route::put('/rentals/{id}','api\RentalsController@update')->middleware('auth:api');
Route::delete('/rentals/{id}','api\RentalsController@delete')->middleware('auth:api');

// Movie Rentals 
Route::post('movie/rentals','api\MovieRentalsController@create')->middleware('auth:api');
Route::get('movie/rentals','api\MovieRentalsController@read')->middleware('auth:api');
Route::put('movie/rentals/{id}','api\MovieRentalsController@update')->middleware('auth:api');
Route::delete('movie/rentals/{id}','api\MovieRentalsController@delete')->middleware('auth:api');

// Users
Route::get('/users','api\UsersController@read')->middleware('auth:api');
Route::put('/users/{id}','api\UsersController@update')->middleware('auth:api');
Route::delete('/users/{id}','api\UsersController@delete')->middleware('auth:api');